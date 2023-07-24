@extends('layouts.front')

@section('title')
  Meu Carrinho
@endsection

@section('content')
<div class="container my-5" style="margin-bottom: 20px">
    <div class="card-shadow">
        @if($cartItems->count() > 0)
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach($cartItems as $item)
            <div class="row product_data">
                <div class="col-md-2-3 my-auto">
                    <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" class="w-25" alt=""/>
                </div>
                <div class="col-md-3 my-auto">
                    <h3> {{$item->products->name}}</h3>
                </div>
                <div class="col-md-3 my-auto">
                    <h3> {{$item->products->original_price}}</h3>
                </div>
                    <div class="col-md-3 my-auto">
                        <input type="hidden" value="{{ $item->products->id }}" class="prod_id">
                        <label for="Quantity">Quantidade</label>
                        <div class="input-group text-center mb-3">
                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                            <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}">
                            <button class="input-group-text changeQuantity increment-btn">+</button>
                        </div>
                    </div>
            </div>
            @php $total += $item->products->original_price * $item->prod_qty; @endphp
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total do pedido: {{$total}}</h6>
            <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Finalizar Compra</a>
        </div>
        @else
        <div class="card-body text-center">
            <h2> Seu <i class="fa fa-shopping-cart"></i>está vazio.</h2>
                <a href="{{url('/')}}" class="btn btn-outline-primary float-end">Continue sua compra</a>
        </div>
        @endif
    </div>
</div>


@endsection
