@extends('layouts.admin')

@section('title')
Pedidos
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Vendas</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                       <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data do pedido</th>
                            <th>Total do pedido</th>
                            <th>Comissão do afiliado</th>
                            <th>Comissão do Produtor</th>
                            <th>Status</th>
                        </tr>
                       </thead>
                       <tbody>
                        @foreach($orders as $item)
                        <tr>
                            <td>{{{$item->id}}}</td>
                            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                            <td>{{$item->total_price}}</td>
                            <td>{{$item->comissao_afiliado}}</td>
                            <td>{{$item->comissao_produtor}}</td>
                            <td>{{$item->status == '0' ? 'pendente' : 'completo'}}</td>
                        </tr>
                        @endforeach
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
