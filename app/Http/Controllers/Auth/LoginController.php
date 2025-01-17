<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        Session::forget(['request_user', 'request_username', 'request_password', 'contact_verify_otp', 'contact_verify_sms_sent']);

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        $login_history = LoginHistory::create([
            'username' => $request->username,
            'request_ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'request_for' => 'Login',
        ]);

        $user = User::where('username', $request->username)
            ->orWhere('email', $request->username)
            ->first();
        if ($user == null) {
            $login_history->remark = 'No Data';
            $login_history->status = 'Failed';
            $login_history->save();

            return redirect('login')
                ->withInput($request->except('password'))
                ->withErrors(['message' => 'Your email or password does not match.']);
        }
        $login_history->user_id = $user->id;
        if (! Hash::check($request->password, $user->password)) {
            $login_history->remark = 'Incorrect Password';
            $login_history->status = 'Failed';
            $login_history->save();

            return redirect('login')
                ->withInput($request->except('password'))
                ->withErrors(['message' => 'Your email or password does not match.']);
        }

        if ($user->status == 0) {
            $login_history->remark = 'Inactive User';
            $login_history->status = 'Failed';
            $login_history->save();

            return view('auth.inactive');
        }

        if ($user->contact_verified == 1 && $user->contact_verified_at == null) {
            $login_history->remark = 'Contact Verify';
            $login_history->status = 'Failed';
            $login_history->save();

            Session::put('request_user', $user);
            Session::put('contact_verify_sms_sent', true);

            return redirect()->route('verify-contact');
        }
        if ($user->mail_verified == 1 && $user->email_verified_at == null) {
            $login_history->remark = 'Email Verify';
            $login_history->status = 'Failed';
            $login_history->save();

            Session::put('request_user', $user);
            Session::put('email_verify_mail_sent', true);

            return redirect()->route('verify-email');
        }

        $credentials['status'] = 1;

        //Login
        if (Auth::attempt($credentials)) {
            $login_history->remark = 'Login';
            $login_history->status = 'Success';
            $login_history->save();
            $session_id = Str::uuid();
            auth()->user()->update([
                'session_id' => $session_id,
            ]);
            Session::put('auth_session_id', $session_id);
            Session::put('auth_password', auth()->user()->password);
            if (auth()->user()->login_status == 0) {
                auth()->user()->update(['login_status' => 1]);
            }

            return redirect()->intended('home');
        } else {
            $login_history->remark = 'Auth Attepmt Failed';
            $login_history->status = 'Failed';
            $login_history->save();

            return redirect('login')
                ->withInput($request->except('password'))
                ->withErrors(['message' => 'Your email or password does not match.']);
        }
    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        if (auth()->check()) {
            auth()->user()->update([
                'session_id' => null,
            ]);
        }

        Session::flush();
        Auth::logout();
        LoginHistory::create([
            'user_id' => $user->id,
            'username' => $user->username,
            'request_ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'request_for' => 'Logout',
            'status' => 'Success',
        ]);

        return redirect('/login');
    }
}
