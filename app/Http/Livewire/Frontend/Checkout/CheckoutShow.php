<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment as ModelsPayment;
use Exception;
use Livewire\Component;
 
use shopid\zarinPal;
use shetabit\Payment\Facade\Payment;


class CheckoutShow extends Component
{
    public $carts, $totalProductAmount, $order, $payment;

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = null, $payment_id = null;

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|integer|max:99999999999,min:10',
            'pincode' => 'required|integer|max:999999999',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'traking_no' => 'funda' . str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode = 'online payment',
            'payment_id' => $this->payment_id,
        ]);
        foreach ($this->carts as $item) {
            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->productID,
                'quantity' => $item->quantity,
                'price' => $item->product->sellingPrice
            ]);
            if ($item->productID != null) {
                $item->product()->where('id', $item->productID)->decrement('quantity', $item->quantity);
            }
        }

        redirect(route('paying',['order' => $order->id]));
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;

        $this->carts = Cart::where('userID', auth()->user()->id)->get();
        foreach ($this->carts as $item) {
            $this->totalProductAmount += $item->product->sellingPrice * $item->quantity;
        }
        return $this->totalProductAmount;
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }
}
