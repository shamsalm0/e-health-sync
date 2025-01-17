<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MailVerifyController extends Controller
{
    public function verifyEmail()
    {
        if (! Session::has(['request_user', 'email_verify_mail_sent'])) {
            return redirect('/login')
                ->withErrors(['message' => 'Time expired. Try again.']);
        }

        $user = Session::get('request_user');
        Session::forget(['email_verify_mail_sent', 'email_verify_otp']);

        $otp = mt_rand(1111, 9999);
        Session::put('email_verify_otp', $otp, Carbon::now()->addMinutes(4));

        Mail::to($user->email)
            ->queue((new SendOtpMail($user, $otp))->onQueue('email-otp'));

        Session::put('email_verify_from', true);

        return view('auth.verify-email');
    }

    public function verifyEmailStore(Request $request)
    {
        if (! Session::has(['email_verify_from', 'request_user'])) {
            return redirect('/login')
                ->withErrors(['message' => 'Time expired. Try again.']);
        }
        $user = Session::get('request_user');
        $session_otp = Session::get('email_verify_otp');

        Session::forget(['email_verify_mail_sent', 'email_verify_otp', 'email_verify_from']);

        $otpDigits = $request->input('otp_digits', []);
        $email_verify_otp = implode('', $otpDigits);

        if ($session_otp == $email_verify_otp) {
            $user->email_verified_at = Carbon::now()->toDateTimeString();
            $user->save();
            $alert = [
                'message' => 'Email successfully verified.',
                'alert-type' => 'success',
            ];

            return redirect('login')->with($alert);
        }

        return redirect('/login')
            ->withErrors(['message' => 'OTP does not match. Try again.']);
    }
}
