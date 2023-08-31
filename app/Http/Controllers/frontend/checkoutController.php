<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment as ModelsPayment;
use Illuminate\Http\Request;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;

class checkoutController extends Controller
{
    public function index()
    {
        return view('frontend.checkout.index');
    }
    public function callback(Request $request)
    {
        // return $request->all();
        try
        {
            $receipt = Payment::amount(1000)->verify();
            echo $receipt->getReferenceId();
            return redirect()->route('thank-you')->with('message','pay was successfuly');
        }
        catch (InvalidPaymentException $exception)
        {
            echo $exception->getMessage();
            return redirect()->route('thank-you')->with('message1','pay was not successfuly');
        }
    }

    public function paying(Order $order)
    {
        $invoice = new Invoice;

        $invoice->amount(1000);
        $payment = Payment::callbackUrl(Route('callback'))->purchase($invoice, function($driver, $transactionId) use($order) {
            ModelsPayment::create([
                'order_id'=> $order->id,
                'bank'=>'zarinpal',
            ]);
        });

        return $payment->pay()->render();
    }

}
