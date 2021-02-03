@extends('layouts.mainlayout')
@section('content')
<section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">

      <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Our Menu</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="/resto/public/home">Home</a></span> <span>Menu</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
    
<section class="ftco-section">
    	 <div class="container products">
 
        <div class="row">
 
            @foreach($items as $item)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $item->photo }}" width="100%" height="300">
                        <div class="caption">
                            <h4>{{ $item->name }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit(strtolower($item->description), 50) }}</p>
                            <p><strong>Price: </strong> {{ $item->price }}$</p>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$item->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
 
        </div><!-- End row -->
 
    </div>
    </section> 
    @endsection