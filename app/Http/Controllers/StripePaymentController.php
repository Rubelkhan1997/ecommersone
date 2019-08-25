<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shippingaddress;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
         $grand_total = $request->grand_total;
         $shipping_id = $request->shipping_id;

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * $grand_total,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);

        Shippingaddress::find($shipping_id)->update([
          'payment_status' => 2,
        ]);

        Session::flash('success', 'Payment successful!');

        return redirect('cart');
    }
}
