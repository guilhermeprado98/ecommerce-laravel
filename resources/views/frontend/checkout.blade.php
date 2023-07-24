@extends('layouts.front')

@section('title')
   Checkout
@endsection

@section('content')
<div class="container mt-3">
    <form action="{{url('place-order')}}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Detalhes Básicos</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="firstName">E-mail</label>

                            <input type="text" name="email" class="form-control" placeholder="Coloque seu E-mail">
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h4>Detalhes do Pedido</h4>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nome do Produto</th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)

                            <tr>
                                <td> {{$item->products->name}}</td>
                                <td> {{$item->prod_qty}}</td>
                                <td> {{$item->products->original_price}}</td>

                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <button type="submit" class="btn btn-primary w-100">Realizar Pedido</button>


                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
