<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentCallbackController extends Controller
{
    public function stkPushCallback(Request $request)
    {
        Log::info('M-Pesa Callback Received', $request->all());

        $callbackData = $request->input('Body.stkCallback');
        if (!$callbackData) {
            return response()->json(['ResultCode' => 1, 'ResultDesc' => 'Invalid callback data']);
        }

        $merchantRequestId = $callbackData['MerchantRequestID'];
        $resultCode = $callbackData['ResultCode'];
        $resultDesc = $callbackData['ResultDesc'];

        $application = Application::where('checkout_request_id', $merchantRequestId)->first();

        if ($application) {
            if ($resultCode == 0) {
                // Payment success – extract transaction ID
                $transactionId = null;
                if (isset($callbackData['CallbackMetadata']['Item'])) {
                    foreach ($callbackData['CallbackMetadata']['Item'] as $item) {
                        if ($item['Name'] === 'MpesaReceiptNumber') {
                            $transactionId = $item['Value'];
                            break;
                        }
                    }
                }
                $application->update([
                    'mpesa_transaction_id' => $transactionId,
                    'payment_status'       => 'paid',
                    'payment_error'        => null,
                ]);
            } else {
                $application->update([
                    'payment_status' => 'failed',
                    'payment_error'  => $resultDesc,
                ]);
            }
        }

        return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Callback processed']);
    }
}
