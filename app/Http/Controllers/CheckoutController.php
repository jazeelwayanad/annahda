<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Api;

class CheckoutController extends Controller
{
    public function process (Request $request, string $plan)
    {
        $plan = Plan::where('name', $plan)->first();

        if(!$plan) {
            return redirect()->back()->with('error', 'Plan not found');
        }

        $view = $plan->name == 'Annahda Plus' ? 'checkout.v1' : 'checkout.v2';
        
        return view($view, ['plan' => $plan]);
    }

    public function create_razorpay_order(Request $request)
    {
        try{
            $request->validate([
                'plan' => 'required',
                'billing_address' => 'required',
                'user' => 'required',
                'quantity' => 'required|numeric|min:1',
            ]);

            $user = User::find($request->input('user'));
            if(!$user){
                throw new \Exception('User does not exists or not logged in');
            }

            $plan = Plan::where('razorpay_plan_id', $request->input('plan'))->first();
            if(!$plan){
                throw new \Exception('Plan not found');
            }

            $billing_address = Address::find($request->billing_address);
            if(!$billing_address){
                throw new \Exception('Address not found');
            }

            $shipping_address = null;
            if($request->shipping_address){
                $shipping_address = Address::find($request->shipping_address);
                if(!$shipping_address) throw new \Exception('Address not found');
            }

            $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

            $order = $api->subscription->create([
                "plan_id" => $request->plan,
                "total_count" => $request->quantity,
                "quantity" => 1,
                "customer_notify" => 1,
                "offer_id" => $plan->razorpay_offer_id,
            ]);
    
            info($order['id']);

            DB::beginTransaction();
            Subscription::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'billing_address' => $billing_address->id,
                'shipping_address' => $shipping_address ? $shipping_address->id : null,
                'razorpay_subscription_id' => $order['id'],
                'status' => "created",
                'expiry_date' => $order['expire_by'],
                'start_date' => $order['start_at'],
                'end_date' => $order['end_at'],
                'total_count' => $order['total_count'],
                'paid_count' => 0,
                'short_url' => $order['short_url'],
                'razorpay_offer_id' => $plan->razorpay_offer_id,
                'price' => $plan->sale_price,
                'sub_total' => $plan->sale_price * $order['total_count'],
                'total' => $plan->sale_price * $order['total_count'],
            ]);
            DB::commit();
    
            return response()->json([
                'status' => false,
                'message' => 'Razorpay order created successfully',
                'subscription_id' => $order['id'],
                'phone' => $billing_address->phone_number,
            ], 200);
        }catch(\Exception $error){
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    public function payment_success(Request $request)
    {
        try{
            info('got here 1');
            $request->validate([
                'razorpay_payment_id' => 'required',
                'razorpay_subscription_id' => 'required',
                'razorpay_signature' => 'required',
            ]);

            $Subscription = Subscription::where('razorpay_subscription_id', $request->razorpay_subscription_id)->first();
            if(!$Subscription){
                throw new \Exception('Subscription not found');
            }

            // authorize payment
            $generated_signature = hash_hmac('sha256', $request->razorpay_payment_id . "|" . $Subscription->razorpay_subscription_id, config('services.razorpay.secret'));

            if ($generated_signature != $request->razorpay_signature) {
                throw new \Exception('Verifying authorization payment failed');
            }
            
            return to_route('app.dashboard')->with("success", "Your payment was successful. Your subscription is now active.");
        }catch(\Exception $error){
            info('got here 6');
            info($error->getMessage());
            return to_route('app.dashboard')->with('error', $error->getMessage());
        }
    }

    public function webhook(Request $request)
    {
        try{
            $events = [
                'subscription.authenticated',
                'subscription.activated',
                'subscription.charged',
                'subscription.completed',
                'subscription.updated',
                'subscription.pending',
                'subscription.halted',
                'subscription.cancelled',
                'subscription.paused',
                'subscription.resumed',
            ];
    
            if (!in_array($request->event, $events)) {
                return response()->json(['status' => false, 'message' => 'Event not supported'], 400);
            }

            $subscription = Subscription::where('razorpay_subscription_id', $request->payload['subscription']['entity']['id'])->first();
            if(!$subscription) {
                return response()->json(['status' => false, 'message' => 'Subscription not found'], 404);
            }

            DB::beginTransaction();

            $subscription->update([
                'status' => $request->payload['subscription']['entity']['status'],
                'paid_count' => $request->payload['subscription']['entity']['paid_count'],
            ]);

            if($request->event == "subscription.activated") {
                $subscription->update([
                    'start_date' => Carbon::createFromTimestamp($request->payload['subscription']['entity']['start_at'])->format('Y-m-d'),
                    'end_date' => Carbon::createFromTimestamp($request->payload['subscription']['entity']['current_end'])->format('Y-m-d'),
                    'expiry_date' => Carbon::createFromTimestamp($request->payload['subscription']['entity']['end_at'])->format('Y-m-d'),
                ]);
            }

            if($request->event == "subscription.charged" && $request->payload['payment']){
                if($subscription->invoice) {
                    return response()->json(['status' => false, 'message' => 'Invoice already exists'], 400);
                }
            
                Invoice::create([
                    'invoice_number' => str_replace('inv_', '', $request->payload['payment']['entity']['invoice_id']),
                    'issue_date' => now(),
                    'subscription_id' => $subscription->id,
                    'plan_id' => $subscription->plan_id,
                    'user_id' => $subscription->user_id,
                    'price' => $subscription->price,
                    'discount' => $subscription->price - ($request->payload['payment']['entity']['amount'] / 100), // Assuming no discount for now
                    'tax' => 0, // Assuming no tax for now
                    'sub_total' => $request->payload['payment']['entity']['amount'] / 100,
                    'total' => $request->payload['payment']['entity']['amount'] / 100,
                    'payment_id' => $request->payload['payment']['entity']['id'],
                    'invoice_id' => $request->payload['payment']['entity']['invoice_id'],
                    'method' => $request->payload['payment']['entity']['method'],
                    'status' => "paid",
                ]);
            }

            DB::commit();

            return response()->json(['status' => true, 'message' => 'Updation success'], 200);
        }catch(\Exception $error){
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $error->getMessage()], 500);
        }
    }
}
