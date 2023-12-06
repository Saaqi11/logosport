<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Conversation;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller {
    private $key;

    public function __construct() {
        $this->key = 'AVDvnmafPAQlZ8Kah5Rdlnq2fLYSbrnYpYCCR9ukOpcRYHhyQOybNk94fyvsfBZNSjpvfVDiclNryGEA:EBXJvP_3QuGY4wNd2YizlDHfujscLM4hJEdydQBpMD9289i548diLp8snjdUq0bOReFsCofD2EqbG-Xc';
    }

    /**
     * Paypal checkout
     * @param $id
     * @return RedirectResponse
     */
    public function paypalCheckout($id): RedirectResponse {
        $contest = Contest::where("id", $id)->where("status", "!=", "3")->first();

        if(!empty($contest)) {
            $contestHash = "";
            if($contest->contest_price <= 200) {
                $contestHash = "L1";
            } else if($contest->contest_price <= 600) {
                $contestHash = "L2";
            } else if($contest->contest_price <= 1400) {
                $contestHash = "L3";
            }

            try {
                $link = $this->proceedPaymentPaypal($contestHash, $id);
                return redirect()->to($link);
            } catch (\Exception | GuzzleException $e) {
                return redirect()->back()->with('error', 'Please try again later');
            }
        }
    }


    /**
     * @param $subscription
     * @return string
     * @throws GuzzleException
     */
    public function proceedPaymentPaypal($contestHash, $id): string {
        $plan_id = env($contestHash."_CONTEST");
        try {
            $url = "https://api.sandbox.paypal.com/v1/billing/subscriptions";

            $client = new Client();
            $response = $client->request('POST', $url,
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Basic '.base64_encode($this->key)
                    ],
                    'json' => [
                        "plan_id" => $plan_id,
                        'application_context' => [
                            "return_url" => url("/customer/contest/payment/payment-success/".$id),
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
    public function paypalSuccess(Request $request, $id): RedirectResponse {

        Contest::where("id", $id)->update(
            [
                'is_paid' => 1
            ]
        );
        $uri = 'https://api.sandbox.paypal.com/v1/billing/subscriptions/'.$request->subscription_id;

        $client = new Client();
        $response = $client->get($uri, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic '.base64_encode($this->key)
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

        foreach($conversations as $key => $conversation) {
            $conversation->payment_status = true;
            $conversation->save();
        }
        return redirect()->route('customer.contest.view')->with('message', 'Registration has been successful');
    }

    /**
     * Payment Error
     * @return string
     */
    public function paypalError(): string {
        return redirect()->route("re-subscription")->with('message', 'Payment not done! Error Occurred!');
    }
}
