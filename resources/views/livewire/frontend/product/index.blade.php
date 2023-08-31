<div>
    <div class="row">
        <div class="col-3">
            @if (! $category->brand)
                <div class="card">
                    <div class="card-header"><h4>BRANDS</h4></div>
                    <div class="card-body">
                        @foreach ($category->brands as $item)
                        <label class="d-block">
                            <input type="checkbox" wire:model="brandInput" value="{{ $item->name }}"/>{{ $item->name }}
                        </label>
                        @endforeach
                    </div>
                </div>
            @else
                no brand to show
            @endif
            <div class="card mt-3">
                <div class="card-header"><h4>PRICE</h4></div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low"/>high to low
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high"/>low to high
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-9 offset-3">
        <div class="row">
            @forelse ($products as $item)
            <div class="col-md-4">
                <div class="product-card">
                    <div class="product-card-img">
                        @if ($item->quantity > 0)
                            <label class="stock bg-success">In Stock</label>
                        @else
                            <label class="stock bg-danger">out Stock</label>
                        @endif
                    </div>
                    <div wire:ignore>
                        @if ($item->productImage->count() > 0)
                        <a href="{{ url('/categories/'.$item->category->slug.'/'.$item->slug) }}">
                            <img src="{{ asset($item->productImage[0]->image) }}" alt="Laptop" style="height: 200px; width: 300px">
                        </a>
                        @endif
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{ $item->brand }}</p>
                        <h5 class="product-name">
                        <a href="{{ url('/categories/'.$item->category->slug.'/'.$item->slug) }}">
                                {{ $item->name }}
                        </a>
                        </h5>
                        <div>
                            <span class="selling-price p-1">${{ $item->sellingPrice }}</span>
                            <span class="original-price p-1">${{ $item->originalPrice }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <h1>NO DATA TO SHOW FOR {{ $category->name }}</h1>
            @endforelse
        </div>
    </div>
</div>
