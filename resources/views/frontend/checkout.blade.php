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
                            @php
                                $totalAmount = 0; // Variável para armazenar o valor total do pedido
                            @endphp
                            @foreach($cartItems as $item)
                                <tr>
                                    <td>{{$item->products->name}}</td>
                                    <td>{{$item->prod_qty}}</td>
                                    <td>R$ {{ number_format($item->products->original_price, 2, ',', '.') }}</td>
                                </tr>
                                @php
                                    $totalAmount += $item->products->original_price * $item->prod_qty;
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-right">Total:</td>
                                <td>R$ {{ number_format($totalAmount, 2, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <button type="submit" class="btn btn-primary w-100">Realizar Pedido</button>

                    <div id="paypal-button-container" style="margin-top: 10px;"></div>

                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection

@section('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=Aaz7qLVhUYgpcQRdlHqv7eB2iE2wc9HUOAqGm9M8KX3ou6jk65N7ZoCyp1Q85tGhEgQ0m2s7EQZNQak4&currency=BRL"></script>

<script>

paypal.Buttons({

    createOrder: function(data, actions) {
            var totalAmount = 0;

            @foreach($cartItems as $item)
                totalAmount += {{$item->products->original_price}} * {{$item->prod_qty}};
            @endforeach

            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: totalAmount.toFixed(2)
                    }
                }]
            });
        },

 onApprove: function(data,actions) {

    return actions.order.capture().then(function(details){


        var email = $('.email').val();

        $.ajax({
            method: "POST",
            url: "/place-order",
            data: {
                'email': data.email, // Corrected to access email value from the 'data' object
                'payment_mode': "By PayPal",
                'payment_id': details.id,
            },
            success: function(response) {
                swal(response.status);
                window.location.href = "/";
            }
        });

    });

 }

}).render('#paypal-button-container');


</script>


@endsection
