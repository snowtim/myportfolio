@extends('layouts.master')

@section('title', 'Home')

@section('content')

  <section class="page-section clearfix">
    <div class="container">
      @foreach($products->chunk(3) as $productchunk)
        <div class="row">
          @foreach($productchunk as $product)
            <div class="col-sm-6 col-md-4">
              <div class="card" style="width: 12rem;">
                <img src="/~/formal/flowerofspring/public/webimg/{{ $product->pic_name }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                      <div class="clearfix">
                        <div class="pull-left price">${{ $product->price }}</div>
                      </div>
                    <a href="/add-to-cart/{{ $product->id }}" class="btn btn-primary">Add to Cart</a>
                  </div>
              </div>
            </div>
          @endforeach
        </div>
      @endforeach
      <!--div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="~/formal/flowerofspring/public/webimg/paCWoaCWkqOZrKSY.jpg" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">
            <span class="section-heading-upper">Fresh Coffee</span>
            <span class="section-heading-lower">Worth Drinking</span>
          </h2>
          <p class="mb-3">Every cup of our quality artisan coffee starts with locally sourced, hand picked ingredients. Once you try it, our coffee will be a blissful addition to your everyday morning routine - we guarantee it!
          </p>
          <div class="intro-button mx-auto">
            <a class="btn btn-primary btn-xl" href="#">Visit Us Today!</a>
          </div>
        </div>
      </div-->
    </div>
  </section>

  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Our Promise</span>
              <span class="section-heading-lower">To You</span>
            </h2>
            <p class="mb-0">When you walk into our shop to start your day, we are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products made with the highest quality ingredients. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection