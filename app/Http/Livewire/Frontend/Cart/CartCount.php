<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCount extends Component
{
    public $cartcount;
    protected $listeners = ['CartAddedUpdated' => 'checkcartcount'];
    public function checkcartcount()
    {
        if(Auth::check())
        {
            return $this->cartcount = Cart::where('userID', auth()->user()->id)->count();
        }
        else
        {
            return $this->cartcount = 0;
        }
    }
    public function render()
    {
        $this->cartcount = $this->checkcartcount();
        return view('livewire.frontend.cart.cart-count',[
            'cartcount' => $this->cartcount
        ]);
    }
}
