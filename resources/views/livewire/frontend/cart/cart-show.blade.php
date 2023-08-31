<div>
    <div>
        <div class="py-3 py-md-5 bg-light">
            <div class="container">
                <h4>My Cart</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="shopping-cart">

                            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4>Products</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <h4>Price</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <h4>Quantity</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <h4>Remove</h4>
                                    </div>
                                </div>
                            </div>
                            @forelse ($cart as $item)
                                @if ($item->product)
                                    <div class="cart-item">
                                        <div class="row">
                                            <div class="col-md-3 my-auto">
                                                <a href="{{ url('categories/'.$item->product->category->slug.'/'.$item->product->slug) }}">
                                                    <label class="product-name">
                                                        <img src="{{ asset($item->product->productImage[0]->image) }}" style="width: 50px; height: 50px" alt="">
                                                        {{ $item->product->name }}
                                                    </label>
                                                </a>
                                                @if ($item->productColor)
                                                        <span>- color: {{ $item->productColor->color->name }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 my-auto">
                                                <label class="price">${{ $item->product->sellingPrice * $item->quantity }} </label>
                                                @php $totalPrice += $item->product->sellingPrice * $item->quantity @endphp
                                            </div>
                                            <div class="col-md-3 col-7 my-auto">
                                                <div class="quantity">
                                                    <div class="input-group">
                                                        <button type="button" class="btn btn1" wire:loading.attr="disabled" wire:click="decrementQuantity({{ $item->id }})"><i class="bi bi-clipboard2-minus-fill"></i></button>
                                                        <input type="text" value="{{ $item->quantity }}" readonly class="input-quantity" />
                                                        <button type="button" class="btn btn1" wire:loading.attr="disabled" wire:click="incrementQuantity({{ $item->id }})"><i class="bi bi-clipboard2-plus-fill"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-5 my-auto">
                                                <div class="remove">
                                                    <button type="button" wire:loading.attr="disabled" wire:click="removeCartItem({{ $item->id }})" class="btn btn-danger btn-sm">
                                                        <span wire:loading.remove wire:target="removeCartItem({{ $item->id }})">
                                                            <i class="fa fa-trash"></i> Remove
                                                        </span>
                                                        <span wire:loading wire:target="removeCartItem({{ $item->id }})">
                                                            <i class="fa fa-trash"></i> Removeing
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <h4>no product in your basket</h4>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 mt-3">
                        <a href="{{ route('categories') }}" class="btn btn-info">Get the best deal & offers</a>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="shadow-sm bg-white p-3">
                            <h4>total:
                                <span class="float-end">${{ $totalPrice }}</span>
                            </h4>
                            <hr>
                            <a href="{{ route('checkout') }}" class="btn btn-warning w-100">check out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
