<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartShow extends Component
{
    public $cart,$quantityCount = 1,$totalPrice = 0;
    public function incrementQuantity(int $cartID)
    {
        $cartData = Cart::where('id',$cartID)->where('userID',auth()->user()->id)->first();
        if($cartData)
        {
            $cartData->increment('quantity');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Quantity updated',
                'type' => 'success',
                'status' => 200
            ]);
        }
        else
        {
            $this->dispatchBrowserEvent('message',[
                'text' => 'Quantity update fail',
                'type' => 'error',
                'status' => 401
            ]);
        }
    }
    public function decrementQuantity(int $cartID)
    {
        $cartData = Cart::where('id',$cartID)->where('userID',auth()->user()->id)->first();
        if($cartData)
        {
            $cartData->decrement('quantity');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Quantity updated',
                'type' => 'success',
                'status' => 200
            ]);
        }
        else
        {
            $this->dispatchBrowserEvent('message',[
                'text' => 'Quantity update fail',
                'type' => 'error',
                'status' => 401
            ]);
        }
    }

    public function removeCartItem(int $cartID)
    {
        $cartRemove = Cart::where('userID',auth()->user()->id)->where('id',$cartID)->first();
        if($cartRemove)
        {
            $cartRemove->delete();
            $this->emit('CartAddedUpdated');
            $this->dispatchBrowserEvent('message',[
                'text' => 'cart item removed',
                'type' => 'success',
                'status' => 200
            ]);
        }
        else
        {
            $this->dispatchBrowserEvent('message',[
                'text' => 'cart item doesnt removed',
                'type' => 'error',
                'status' => 401
            ]);
        }
    }

    public function render()
    {
        $this->cart = Cart::where('userID', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',[
            'cart' => $this->cart
        ]);
    }
}
