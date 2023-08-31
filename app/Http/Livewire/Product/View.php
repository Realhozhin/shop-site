<?php

namespace App\Http\Livewire\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\product;

class View extends Component
{
    public $category, $product,$quantityCount = 1,$productSelectedQuantity,$productColorId;

    public function AddToWhishList($productID)
    {
        if(Auth::check())
        {
            if(Wishlist::where('userID',auth()->user()->id)->where('productID',$productID)->exists())
            {
                session()->flash('message','allready added to wishlist');
                return false;
            }
            else
            {
                Wishlist::create([
                    'userID' => auth()->user()->id,
                    'productID' => $productID
                ]);
                $this->dispatchBrowserEvent('message',[
                    'text' => 'wishlist added successfully',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message',[
                'text' => 'please login to continue',
                'type' => 'info',
                'status' => 401
            ]);
           return false;
        }
    }
    public function incrementQuantity()
    {
        if($this->quantityCount < 10)
        {
            $this->quantityCount++;
        }
    }
    public function decrementQuantity()
    {
        if($this->quantityCount > 1)
        {
            $this->quantityCount--;
        }
    }
    public function AddToCart(int $id)
    {
        if(Auth::check())
        {
            // dd($id);
            if ($this->product->where('id',$id)->where('status','on')->exists())
            {
                if($this->product->productColor()->count() > 1)
                {
                    if($this->productSelectedQuantity != null)
                    {
                        $productColor = $this->product->productColor()->where('id',$this->productColorId)->first();
                        if($productColor->quantity > 0)
                        {
                                // insert product into cart
                            if($productColor->quantity > $this->quantityCount)
                            {
                                Cart::create([
                                    'userID' => auth()->user()->id,
                                    'productID' => $id,
                                    'productColorId' => $this->productColorId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message',[
                                    'text' => 'product added to cart',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            }
                            else
                            {
                            $this->dispatchBrowserEvent('message', [
                                    'text' => 'only'.$productColor->quantity.'Quantity available',
                                    'type' => 'warning',
                                    'status' => 200
                                ]);
                            }
                        }
                        else
                        {
                            $this->dispatchBrowserEvent('message',[
                                'text' => 'out of stuck',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message',[
                            'text' => 'select your product color',
                            'type' => 'info',
                            'status' => 401
                        ]);
                    }
                }
                else
                {
                    if($this->product->quantity > 0)
                    {
                        // insert product into cart
                        if($this->product->quantity > $this->quantityCount)
                        {
                            Cart::create([
                                'userID' => auth()->user()->id,
                                'productID' => $id,
                                'quantity' => $this->quantityCount
                            ]);
                            $this->emit('CartAddedUpdated');
                            $this->dispatchBrowserEvent('message',[
                                'text' => 'product added to cart',
                                'type' => 'success',
                                'status' => 200
                            ]);
                        }
                        else
                        {
                           $this->dispatchBrowserEvent('message', [
                                'text' => 'only'.$this->product->quantity.'Quantity available',
                                'type' => 'warning',
                                'status' => 200
                            ]);
                        }
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message',[
                            'text' => 'out of stock',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    }
                }
            }
            else
            {
                $this->dispatchBrowserEvent('massage',[
                    'text' => 'product does not exsists',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        }
        else
        {

            $this->dispatchBrowserEvent('message',[
                'text' => 'please enter to add to cart',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }

    public function colorselected($productColorId)
    {
        $this->productColorId = $productColorId;
        // dd($productColorId);
        $productColor = $this->product->productColor()->where('id',$productColorId)->first();
        // dd($productColor);
        $this->productSelectedQuantity =  $productColor->quantity;

        if($this->productSelectedQuantity == 0)
        {
            $this->productSelectedQuantity = 'outOfStock';
        }
    }
    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.product.view',[
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
