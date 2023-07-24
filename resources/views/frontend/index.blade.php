@extends('layouts.front')

@section('title')
   Bem vindo ao E-commerce
@endsection

@section('content')
@include('layouts.inc.slider')
<div class="py-5">
    <div class="container">
        <div class="row">

            <div class="owl-carousel featured-carousel owl-theme">

                @foreach ($featured_products as $prod)
                    <div class="item">
                        <div class="card">
                            <a href="{{url('products/'.$prod->id)}}">
                        <img src="{{asset('assets/uploads/products/'.$prod->image)}}"></img>
                                <div class="card-body">
                                    <h5>{{$prod->name}}</h5>
                                    <span class="float-start">{{$prod->original_price}}</span>
                                </div>
                            </a>
                            </div>
                        </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
</script>
@endsection
