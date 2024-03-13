<?php

namespace App\Http\Controllers;

use App\Models\CmsSetting;
use App\Models\Contest;
use App\Models\Conversation;
use App\Models\Payment;
use App\Models\Reward;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WithdrawRequest;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// require 'vendor/autoload.php';

class PaymentController extends Controller
{
    private $key;

    public function __construct()
    {
        $this->key = 'AVDvnmafPAQlZ8Kah5Rdlnq2fLYSbrnYpYCCR9ukOpcRYHhyQOybNk94fyvsfBZNSjpvfVDiclNryGEA:EBXJvP_3QuGY4wNd2YizlDHfujscLM4hJEdydQBpMD9289i548diLp8snjdUq0bOReFsCofD2EqbG-Xc';
    }

    /**
     * Paypal checkout
     * @param $id
     * @return RedirectResponse
     */
    public function paypalCheckout($id): RedirectResponse
    {

        $contest = Contest::where("id", $id)->where("status", "!=", "3")->first();

        if (!empty($contest)) {
            $contestHash = "";
            if ($contest->contest_price <= 200) {
                $contestHash = "L1";
            } else if ($contest->contest_price <= 600) {
                $contestHash = "L2";
            } else if ($contest->contest_price <= 1400) {
                $contestHash = "L3";
            }

            try {
                // $link = $this->proceedPaymentPaypal($contestHash, $id);
                $link = $this->proceedCloudIpsp($contest);
                return redirect()->to($link);
            } catch (\Exception | GuzzleException $e) {
                return redirect()->back()->with('error', 'Please try again later');
            }
        }
    }


    public function proceedCloudIpsp($contest): string
    {
        try {
            \Cloudipsp\Configuration::setMerchantId(env('MERCHANT_ID'));
            \Cloudipsp\Configuration::setSecretKey(env('MERCHANT_KEY'));
            $data = [
                'order_desc' => $contest->company_name,
                'currency' => 'USD',
                'amount' => ($contest->contest_price * 100),
                'response_url' => config('app.url') . '/customer/payment/responseurl',
                'server_callback_url' => config('app.url') . '/callbackurl',
                'sender_email' => $contest->customer->email,
                'lang' => 'ru',
                'product_id' => $contest->id,
                'lifetime' => 36000,
                'merchant_data' => array(
                    'user_id' => Auth::id(),
                    'contest_id' => $contest->id
                )
            ];
            $url = \Cloudipsp\Checkout::url($data);
            $data = $url->getData();
            return $data['checkout_url'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function responseCloudIpsp(Request $request)
    {
        $data = $request->all();
        // return redirect

        $additionalInfo = json_decode($data['merchant_data'], true);

        $user = User::where('id', $additionalInfo['user_id'])->first();

        Auth::login($user);

        Contest::where("id", $additionalInfo['contest_id'])->update(
            [
                'is_paid' => 1
            ]
        );

        $payment = Payment::create([
            'contest_id' => $additionalInfo['contest_id'],
            'user_id' => $additionalInfo['user_id'],
            'amount' => ($data['amount'] / 100),
            'create_date' => $data['order_time'],
            'currency' => $data['actual_currency'],
            'status' => $data['order_status'],
            'method' => 'fondy',
            'order_id' => $data['order_id'],
            'payment_id' => $data['payment_id'],
        ]);

        $conversations = Conversation::where('contest_id', $additionalInfo['contest_id'])->get();

        foreach ($conversations as $key => $conversation) {
            $conversation->payment_status = true;
            $conversation->save();
        }
        return redirect()->route('customer.contest.view')->with('message', 'Registration has been successful');
    }

    /**
     * @param $subscription
     * @return string
     * @throws GuzzleException
     */
    public function proceedPaymentPaypal($contestHash, $id): string
    {
        $plan_id = env($contestHash . "_CONTEST");
        try {
            $url = "https://api.sandbox.paypal.com/v1/billing/subscriptions";

            $client = new Client();
            $response = $client->request(
                'POST',
                $url,
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Basic ' . base64_encode($this->key)
                    ],
                    'json' => [
                        "plan_id" => $plan_id,
                        'application_context' => [
                            "return_url" => url("/customer/contest/payment/payment-success/" . $id),
                            "cancel_url" => url("/customer/contest/payment/payment-error")
                        ]
                    ]
                ]
            );
            $response = $response->getBody()->getContents();
            $response = json_decode($response);
            return $response->links['0']->href;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * PayPal success
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws GuzzleException
     */
    public function paypalSuccess(Request $request, $id): RedirectResponse
    {

        Contest::where("id", $id)->update(
            [
                'is_paid' => 1
            ]
        );
        $uri = 'https://api.sandbox.paypal.com/v1/billing/subscriptions/' . $request->subscription_id;

        $client = new Client();
        $response = $client->get($uri, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode($this->key)
            ],
        ]);

        $response = json_decode($response->getBody(), true);
        $currency_code = $response['billing_info']['outstanding_balance']['currency_code'];
        $value = $response['billing_info']['last_payment']['amount']['value'];
        $payer_id = $response['subscriber']['payer_id'];
        $next_billing_time = $response['billing_info']['next_billing_time'];
        $status_update_time = $response['status_update_time'];
        $start_time = $response['start_time'];
        $plan_id = $response['plan_id'];

        Contest::where("id", Auth::user()->id)->update(
            [
                'is_paid' => 1
            ]
        );

        Payment::insert([
            'contest_id' => $id,
            'user_id' => Auth()->user()->id,
            'amount' => $value,
            'create_date' => $start_time,
            'currency' => $currency_code,
            'status' => $response['status'],
            'start_date' => $status_update_time,
            'end_date' => $next_billing_time,
            'method' => 'Paypal',
            'paypal_plan_id' => $plan_id,
        ]);

        $conversations = Conversation::where('contest_id', $id)->get();

        foreach ($conversations as $key => $conversation) {
            $conversation->payment_status = true;
            $conversation->save();
        }
        return redirect()->route('customer.contest.view')->with('message', 'Registration has been successful');
    }

    /**
     * Payment Error
     * @return string
     */
    public function paypalError(): string
    {
        return redirect()->route("re-subscription")->with('message', 'Payment not done! Error Occurred!');
    }


    public function walletIndex()
    {
        $transactions = Transaction::where('user_id', Auth::id())->get();
        $setting = CmsSetting::where('code', 'commission_rate')->first();


        return view('wallet.transaction', compact('transactions', 'setting'));
    }

    public function walletCount()
    {
        $userId = Auth::id();
        $reward = Reward::where('user_id', $userId)->first();

        if (!$reward) {
            return response()->json(['status' => true, 'data' => 0]);
        }

        $count = $reward->remaining + $reward->request_pending;

        return response()->json(['status' => true, 'data' => $count]);
    }

    public function withdrawRequest(Request $request)
    {
        $userId = Auth::id();
        $reward = Reward::where('user_id', $userId)->first();
        if (!$reward) {
            return redirect()->back()->with("error", "Reward not found");
        }

        if ($reward->remaining < $request->ammount) {
            if ($reward->request_pending >= $request->ammount) {
                $remainingAmmount = $reward->request_pending - $request->ammount;
                if ($remainingAmmount == 0) {
                    return redirect()->back()->with("error", "Your previous Request is in pending and for new request you don't have suficient balance");
                } else {
                    return redirect()->back()->with("error", "Your previous Request is in pending so you should only withdraw " . $remainingAmmount . " USD");
                }
            } else {
                return redirect()->back()->with("error", "You don't have suficient balance");
            }
        }


        $setting = CmsSetting::where('code', 'commission_rate')->first();
        $withdrawRequest = new WithdrawRequest();

        $withdrawRequest->user_id = Auth::id();
        $withdrawRequest->account_no = $request->account;
        $withdrawRequest->ammount = $request->ammount;
        $withdrawRequest->commission = $setting->value;

        $withdrawRequest->save();

        $reward->remaining = $reward->remaining - $request->ammount;
        $reward->request_pending = $reward->request_pending + $request->ammount;
        $reward->save();

        return redirect()->back()->with("success", "Withdraw request has successfully, one admin verify the detail its sent to your account");
    }

    public function withdrawRequestList()
    {
        $withdraws = WithdrawRequest::where('user_id', Auth::id())->get();

        return view('wallet.withdraw-request-list', compact('withdraws'));
    }
}
