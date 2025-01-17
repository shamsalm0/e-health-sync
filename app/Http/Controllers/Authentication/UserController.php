<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\LoginHistory;
use App\Models\PasswordHistory;
use App\Models\Section;
use App\Models\Sms;
use App\Models\User;
use App\Traits\PasswordGenerator;
use App\Traits\SendSms;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use PasswordGenerator, SendSms;

    private $data = [];

    public function __construct()
    {
        $name = 'User';
        $this->middleware("permission:$name View|$name Add|$name Edit|$name Delete", ['only' => ['index', 'show']]);
        $this->middleware("permission:$name Add", ['only' => ['create', 'store']]);
        $this->middleware("permission:$name Edit", ['only' => ['edit', 'update']]);
        $this->middleware("permission:$name Delete", ['only' => ['destroy']]);
    }

    private function select()
    {
        // $this->data['departments'] = Department::selectMenu();
        // $this->data['sections'] = Section::selectMenu();
        // $this->data['designations'] = Designation::selectMenu();
        $this->data['roles'] = Role::pluck('name', 'name')->all();
    }

    public function index()
    {
        return view('authentication.user.index');
    }

    public function create()
    {
        $this->select();
        $this->data['user'] = new User;

        return view('authentication.user.create', $this->data);
    }

    public function store(UserCreateRequest $request)
    {
        $password = $this->generatePassword();
        $sms = Sms::where('title', 'User Create')->latest()->first();
        if (! $sms) {
            $alert = [
                'type' => 'Error',
                'message' => 'Sms configuration is not set up. Please contact with support',
            ];

            return redirect()->back()->with($alert)->withInput();
        }

        $user = User::create(array_merge($request->all(), ['password' => $password]));

        PasswordHistory::create([
            'user_id' => $user->id,
            'password' => bcrypt($password),
        ]);

        $user->assignRole($request->input('roles'));

        // send sms
        $contact = $request->input('contact');

        $from = ['#username#', '#password#'];
        $to = [$user->username, $password];

        $message = trim(str_replace($from, $to, $sms->body));
        $respose = $this->sendSmsLocal($contact, $message, 'User Create');

        $alert = [
            'type' => 'Success',
            'message' => 'User created successfully.',
        ];

        return redirect()->route('user.index')
            ->with($alert);
    }

    public function show($id)
    {
        $this->data['user'] = User::active()->findOrFail($id);

        return view('authentication.user.show', $this->data);
    }

    public function edit($id)
    {
        $this->select();

        $this->data['user'] = User::findOrFail($id);

        return view('authentication.user.edit', $this->data);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->except('password');
        if ($user->login_status == 1) {
            unset($data['username']);
            unset($data['contact']);
            unset($data['email']);
        }

        $user->update($data);

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($request->input('roles'));

        LoginHistory::create([
            'user_id' => $user->id,
            'username' => $user->username,
            'request_ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'request_for' => 'Logout',
            'status' => 'Success',
            'remark' => 'User Updated',
        ]);
        $user->update([
            'session_id' => null,
        ]);
        $alert = [
            'type' => 'Success',
            'message' => 'User updated successfully',
        ];

        return redirect()->route('user.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        return redirect()->route('user.index')
            ->with([
                'type' => 'Error',
                'message' => "User can't be deleted",
            ]);
        // $user = User::findOrFail($id);

        // if ($user->login_status == 1) {
        //     return redirect()->route('user.index')
        //         ->with([
        //             'type' => 'Error',
        //             'message' => "User can't be deleted",
        //         ]);
        // }

        // $user->delete();

        // return redirect()->route('user.index')
        //     ->with([
        //         'type' => 'Success',
        //         'message' => 'User deleted successfully',
        //     ]);
    }

    // // change password
    // public function changePassword(User $user)
    // {
    //     return view('user.change-password', compact('user'));
    // }

    // public function updatePassword(Request $request, User $user)
    // {
    //     $password = $this->generatePassword();

    //     PasswordHistory::create([
    //         'user_id' => $user->id,
    //         'password' => $user->password,
    //     ]);

    //     $user->password_changed_at = null;
    //     $user->password = $password;
    //     $user->password_changed_at = null;
    //     $user->save();

    //     PasswordHistory::create([
    //         'user_id' => $user->id,
    //         'password' => bcrypt($password),
    //     ]);

    //     // send sms
    //     $contact = $user->contact;
    //     $sms = Sms::where('title', 'Reset Password')->latest()->first();
    //     if (! $sms) {
    //         $notification = [
    //             'message' => 'Sms configuration is not set up. Please contact with support',
    //             'alert-type' => 'error',
    //         ];

    //         return redirect()->back()->with($notification);
    //     }

    //     $from = ['#password#'];
    //     $to = [$password];

    //     $message = trim(str_replace($from, $to, $sms->body));
    //     $respose = $this->sendSms($contact, $message, 'Password Reset');

    //     // sending mail
    //     // Mail::to($user->email)->send(new SendOtpMail($user, $password));
    //     $alert = [
    //         'type' => 'Success',
    //         'message' => 'Reset Password successfully',
    //     ];

    //     return redirect()->route('user.index')->with($alert);
    // }

    // public function userProfile($id)
    // {
    //     $data['user'] = User::findOrFail($id);
    //     if ($data['user'] && Auth::user()->id == $data['user']->id) {
    //         return view('user.profile', $data);
    //     } else {
    //         $alert = [
    //             'type' => 'Error',
    //             'message' => 'You are not authorized to view this profile.',
    //         ];

    //         return redirect()->back()->with($alert);
    //     }
    // }

    // public function toggleStatus(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);

    //     if (! $user->contact) {
    //         $alert = [
    //             'message' => 'Contact number can not be empty.',
    //             'type' => 'Warning',
    //         ];

    //         return redirect()->back()->with($alert);
    //     }
    //     if ($user->status == 0) {
    //         $password = $this->generatePassword();
    //         $sms = Sms::where('title', 'User Activate')->latest()->first();
    //         if (! $sms) {
    //             $notification = [
    //                 'message' => 'Sms configuration is not set up. Please contact with support',
    //                 'alert-type' => 'error',
    //             ];

    //             return redirect()->back()->with($notification);
    //         }

    //         $from = ['#username#', '#password#'];
    //         $to = [$user->username, $password];
    //         $message = trim(str_replace($from, $to, $sms->body));
    //         $user->status = 1;
    //         $user->password = $password;
    //         $user->password_changed_at = null;
    //         $user->save();
    //         PasswordHistory::create([
    //             'user_id' => $user->id,
    //             'password' => bcrypt($password),
    //         ]);
    //         $this->sendSms($user->contact, $message, 'Password Reset');
    //         $message = 'Active user successfully';
    //     } else {
    //         $user->status = 0;
    //         $user->save();
    //         $message = 'User Inactive successfully';
    //     }
    //     $alert = [
    //         'type' => 'Success',
    //         'message' => $message,
    //     ];

    //     return redirect()->route('user.index')
    //         ->with($alert);
    // }

    // public function toggleOTPStatus(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);
    //     // Toggle the status value
    //     $user->otp_verified = ! $user->otp_verified;
    //     $user->save();

    //     $message = $user->otp_verified ? 'OTP enabled successfully' : 'OTP disabled successfully';

    //     $alert = [
    //         'type' => 'Success',
    //         'message' => $message,
    //     ];

    //     return redirect()->route('user.index')
    //         ->with($alert);
    // }

    // public function toggleEmailStatus(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);
    //     // Toggle email verification
    //     $user->mail_verified = ! $user->mail_verified;
    //     $user->save();

    //     $message = $user->mail_verified ? 'Email verification enabled successfully' : 'Email verification disabled successfully';

    //     $alert = [
    //         'type' => 'Success',
    //         'message' => $message,
    //     ];

    //     return redirect()->route('user.index')
    //         ->with($alert);
    // }

    // public function toggleContactStatus(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);
    //     // Toggle email verification
    //     $user->contact_verified = ! $user->contact_verified;
    //     $user->save();

    //     $message = $user->contact_verified ? 'Contact verification enabled successfully' : 'Contact verification disabled successfully';

    //     $alert = [
    //         'type' => 'Success',
    //         'message' => $message,
    //     ];

    //     return redirect()->route('user.index')
    //         ->with($alert);
    // }
}
