<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-4">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($wishlist as $item)
                            @if ($item->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-6 my-auto">
                                            <a href="{{ url('categories/'.$item->product->category->slug.'/'.$item->product->slug) }}">
                                                <label class="product-name">
                                                    <img src="{{ asset($item->product->productImage[0]->image) }}" style="width: 50px; height: 50px" alt="">
                                                    {{ $item->product->name }}
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">${{ $item->product->sellingPrice }} </label>
                                        </div>
                                        {{-- <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <span class="btn btn1"><i class="bi bi-clipboard2-minus-fill"></i></span>
                                                    <input type="text" value="1" class="input-quantity" />

                                                    <span class="btn btn1"><i class="bi bi-clipboard2-plus-fill"></i></span>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <a href="" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Remove
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <h4>no wishlist added</h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
