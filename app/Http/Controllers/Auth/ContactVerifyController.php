<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Sms;
use App\Traits\SendSms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactVerifyController extends Controller
{
    use SendSms;

    public function verifyContact()
    {
        if (! Session::has(['request_user', 'contact_verify_sms_sent'])) {
            return redirect('/login')
                ->withErrors(['message' => 'Time expired. Try again.']);
        }

        $user = Session::get('request_user');
        Session::forget(['contact_verify_sms_sent', 'contact_verify_otp']);

        $sms = Sms::where('title', 'Contact Verify OTP')->first();
        if ($sms == null) {
            return redirect('/login')
                ->withErrors(['message' => 'SMS not configured. Contact with support team.']);
        }

        $otp = mt_rand(1111, 9999);
        Session::put('contact_verify_otp', $otp, Carbon::now()->addMinutes(4));
        $message = str_replace('#otp#', $otp, $sms->body);

        $response = $this->sendSmsLocal($user->contact, $message, 'Contact Verify');
        if ($response == true) {
            Session::put('contact_verify_form', true);

            return view('auth.verify-contact');
        }

        return redirect('/login')
            ->withErrors(['message' => 'SMS not sent. Try again']);
    }

    public function verifyContactStore(Request $request)
    {
        if (! Session::has(['contact_verify_form', 'request_user'])) {
            return redirect('/login')
                ->withErrors(['message' => 'Time expired. Try again.']);
        }
        $user = Session::get('request_user');
        $session_otp = Session::get('contact_verify_otp');

        Session::forget(['contact_verify_sms_sent', 'contact_verify_otp', 'contact_verify_form']);

        $otpDigits = $request->input('otp_digits', []);
        $contact_verify_otp = implode('', $otpDigits);

        if ($session_otp == $contact_verify_otp) {
            $user->contact_verified_at = Carbon::now()->toDateTimeString();
            $user->save();
            $alert = [
                'message' => 'Contact number successfully verified.',
                'alert-type' => 'success',
            ];

            return redirect('login')->with($alert);
        }

        return redirect('/login')
            ->withErrors(['message' => 'OTP does not match. Try again.']);
    }
}
