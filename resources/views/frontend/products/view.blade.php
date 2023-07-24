@extends('layouts.front')

@section('title',$products->name)


@section('content')


<div class="container" style="margin-bottom: 20px">
    <div class="row">
        <div class="card-shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{asset('assets/uploads/products/'.$products->image)}}" class="w-100" alt="">
                    </div>
                    <div clas="col-md-8">
                        <h2 class="mb-0">
                            {{$products->name}}

                        </h2>
                        <hr>
                        <label class="me-3"> Preço : R$ {{$products->original_price}} </label>
                        <p class="mt-3">
                            {!!$products->description!!}
                        </p>
                        <hr>
                        <div class="col-md-2">
                           <input type="hidden" value="{{ $products->id }}" class="prod_id">
                            <label for="Quantity">Quantidade</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" value="1" class="form-control qty-input"/>
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-10">
                        <br/>
                        <button type="button" class="btn btn-primary me-3 addToCartBtn float-start"> Adicionar ao carrinho<i class="fa fa-shopping-cart"></i></button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
