<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class CheckoutController extends Controller
{
    public function process (Request $request)
    {
        $planId = $request->input('plan_id');
        $plan = Plan::where('id', $planId)->first();
        // dd($plan);
        return view('checkout', ['plan' => $plan]);
    }
}
