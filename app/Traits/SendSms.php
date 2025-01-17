<?php

namespace App\Traits;

use App\Models\MessageLog;
use Illuminate\Support\Facades\Http;

trait SendSms
{
    public function sendSms($number, $message, $sendFor)
    {
        try {
            $response = Http::withOptions(['timeout' => 100])->get(env('SMS_URL'), [
                'api_key' => env('SMS_KEY'),
                'senderid' => env('SMS_SENDER'),
                'contacts' => $number,
                'msg' => $message,
                'type' => 'text',
            ]);
            $this->logSmsMessage($number, $message, $response->body(), $sendFor);
            $response_json = $response->json();

            if (! in_array($response->body(), array_keys(config('sms.error_code')))) {
                return true;
            }

            // if (isset($response_json['error'])) {
            //     if ($response_json['error'] == false) {
            //         return true;
            //     }
            // }
            return false;
        } catch (\Exception $e) {
            $this->logSmsMessage($number, $message, $e->getMessage(), $sendFor);

            return false;
        }
    }

    public function sendSmsLocal($number, $message, $sendFor)
    {
        try {
            $response = Http::withOptions(['timeout' => 100])->get(env('SMS_URL'), [
                'api_key' => env('SMS_KEY'),
                'senderid' => env('SMS_SENDER'),
                'number' => $number,
                'message' => $message,
                'type' => 'text',
            ]);
            $this->logSmsMessage($number, $message, $response->body(), $sendFor);
            $response_json = $response->json();

            return true;
        } catch (\Exception $e) {
            $this->logSmsMessage($number, $message, $e->getMessage(), $sendFor);

            return false;
        }
    }

    private function logSmsMessage($number, $message, $response, $sendFor)
    {
        MessageLog::create([
            'contact' => $number,
            'message_body' => $message,
            'response' => $response,
            'send_for' => $sendFor,
        ]);
    }
}
