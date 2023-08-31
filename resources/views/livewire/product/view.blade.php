<div>
    <div class="py-3 py-md-5 ">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-warning text-center">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('message1'))
            <div class="alert alert-success text-center">
                {{ session('message1') }}
            </div>
            @endif
            @if (session()->has('message2'))
            <div class="alert alert-danger text-center">
                {{ session('message2') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if ($product->productImage)
                           {{-- <img src="{{ asset($product->productImage[0]->image) }}" class="w-100" alt="Img" style="height: 200px; width: 250px"> --}}
                           <div class="exzoom" id="exzoom"  wire:ignore>
                            <!-- Images -->
                            <div class="exzoom_img_box" x-ignore>
                              <ul class='exzoom_img_ul'>
                                @foreach ($product->productImage as $item)
                                    <li><img src="{{ asset($item->image) }}"/></li>
                                @endforeach
                              </ul>
                            </div>
                            <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                            <div class="exzoom_nav"></div>
                            <!-- Nav Buttons -->
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                          </div>
                        @else
                            <h5>no image to show</h5>
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">${{ $product->sellingPrice }}</span>
                            <span class="original-price">${{ $product->originalPrice }}</span>
                        </div>
                        <div>
                            @if ($product->productColor->count() > 0)
                                @if ($product->productColor)
                                    @foreach ($product->productColor as $item)
                                        <label class="colorselection" style="background-color: {{ $item->color->code }}" wire:click="colorselected({{ $item->id }})">
                                            {{ $item->color->name }}
                                        </label>
                                    @endforeach
                                @endif
                                    <div>
                                        @if($this->productSelectedQuantity == 'outOfStock')
                                            <label class="btn-sm py-1 mt-2 text-white bg-danger">out Stock</label>
                                        @elseif ($this->productSelectedQuantity > 0)
                                            <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                        @endif
                                    </div>
                            @else
                                @if ($product->quantity > 0)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                @else
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">out Stock</label>
                                @endif
                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="bi bi-clipboard2-minus-fill"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="bi bi-clipboard2-plus-fill"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            @if ($product->quantity > 0)
                            <button type="button" wire:click="AddToCart({{ $product->id }})" class="btn btn1">
                                <i class="bi bi-basket-fill"></i> Add To Cart
                            </button>
                            @endif
                            <button type="button" wire:click="AddToWhishList({{ $product->id }})" class="btn btn1">
                                 <i class="bi bi-balloon-heart-fill"></i> Add To Wishlist
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{ $product->smallDescription }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
           $(function(){

                $("#exzoom").exzoom({

                // thumbnail nav options
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,

                // autoplay
                "autoPlay": false,

                // autoplay interval in milliseconds
                "autoPlayTimeout": 2000

                });

                });
    </script>
@endpush
