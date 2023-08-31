<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category, $brandInput = [], $priceInput;
    protected $queryString = [
        'brandInput' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],

    ];
    public function mount($category)
    {
        $this->category = $category;
    }
    public function render()
    {
        $this->products = product::where('category_id',$this->category->id)
                                ->when($this->brandInput, function($q) {
                                    $q->whereIn('brand', $this->brandInput);
                                })
                                ->when($this->priceInput, function($q) {

                                    $q->when($this->priceInput == 'high-to-low', function($q2) {
                                        $q2->orderBy('sellingPrice','DESC');
                                    })
                                    ->when($this->priceInput == 'low-to-high', function($q3) {
                                        $q3->orderBy('sellingPrice','ASC');
                                    });
                                })
                                ->where('status','on')
                                ->get();

        return view('livewire.frontend.product.index',[
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}
