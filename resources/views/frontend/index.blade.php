@extends('layouts.app')
@section('title','hello world')
@section('content')
<!-- make slider -->
<div id="carouselExampleCaptions" class="carousel slide">
    {{-- <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div> --}}
    <div class="carousel-inner">
        @foreach ($slider as $key => $item)
            <div class="carousel-item {{ $key == 1 ? 'active':'' }}">
                <img src="{{ asset('image/slider/'.$item->image) }}" class="d-block w-100" alt="..." style="height: 500px">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color:rgb(14, 31, 98)">{{ $item->title }}</h5>
                    <p style="color:rgb(246, 245, 247)">{{ $item->description }}</p>
                </div>
            </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- end make slider  -->
<!-- make album -->
    <section class="team-title">
        <section class="row ml-0 mr-0">
            <section class="col-4 offset-4">
                <h3 class="text-center font-weight-bold pt-5" style="color: #cbdc35"><strong>newest product</strong></h3>
                <hr>
            </section>
        </section>
    </section>
    <div class="album py-5 bg-body-tertiary">

        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($product as $item)

                <div class="col">
                <div class="card shadow-sm">
                    <a href="{{ url('/categories/'.$item->category->slug.'/'.$item->slug) }}">
                        <img src="{{ asset($item->productImage[0]->image) }}" alt="Laptop" style="height: 220px; width: 420px">
                    </a>
                    <div class="card-body">
                    <p class="card-text">{{ $item->name }}</p>
                    <p class="card-text">{{ $item->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ url('/categories/'.$item->category->slug.'/'.$item->slug) }}">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            </a>
                        </div>
                        <small class="text-body-secondary">quantity: {{ $item->quantity }}</small>
                    </div>
                    </div>
                </div>
                </div>
    @endforeach
            </div>
        </div>
    </div>
<!-- \make album -->
<!-- make footer -->
<div class="container mt-5">
    <footer class="py-5">
      <div class="row">
        <div class="col-6 col-md-2 mb-3">
          <h5>contact us</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><h6 style="color: dodgerblue">Address:</h6> {{ $appSetting->address ?? '' }}</li>
            <li class="nav-item mb-2"><h6 style="color: dodgerblue">phone 1:</h6> {{ $appSetting->phone1 ?? '' }}</li>
            <li class="nav-item mb-2"><h6 style="color: dodgerblue">phone 2:</h6> {{ $appSetting->phone2 ?? '' }}</li>
            <li class="nav-item mb-2"><h6 style="color: dodgerblue">email 1:</h6> {{ $appSetting->email1 ?? '' }}</li>
            <li class="nav-item mb-2"><h6 style="color: dodgerblue">email 2:</h6> {{ $appSetting->email2 ?? '' }}</li>
          </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
          </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
          </ul>
        </div>

        <div class="col-md-5 offset-md-1 mb-3">
          <form>
            <h5>Subscribe to our newsletter</h5>
            <p>Monthly digest of what's new and exciting from us.</p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Email address</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
              <button class="btn btn-primary" type="button">Subscribe</button>
            </div>
          </form>
        </div>
      </div>

      <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <p>© 2023 Company, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
            <a href="{{ $appSetting->twitter ?? '' }}" ><i class="bi bi-twitter" style="font-size: 2rem;"></i></a>
            <a href="{{ $appSetting->facebook ?? '' }}"><i class="bi bi-facebook" style="font-size: 2rem;"></i></a>
            <a href="{{ $appSetting->youtube ?? '' }}"><i class="bi bi-youtube" style="font-size: 2rem;"></i></a>
        </ul>
      </div>
    </footer>
  </div>
<!-- \make footer -->
@endsection
