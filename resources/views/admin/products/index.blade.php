@extends('layouts.admin')


@section('content')
<div class="card">
    <div class="card-header">

        <h4>Lista de Produtos</h4>
        <hr>
    </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Categoria
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Descrição
                        </th>
                        <th>
                            Valor
                        </th>
                        <th>
                            Afiliado
                        </th>
                        <th>
                            Produtor
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <trbody>
                    @foreach($products as $item)
                    <tr>
                        <td>{{$item->id}} </td>
                        <td>{{$item->category->name}} </td>
                        <td>{{$item->name}}  </td>
                        <td>{{$item->description}}  </td>
                        <td>{{$item->original_price}}  </td>
                        <td>{{$item->afiliado->name}}  </td>
                        <td>{{$item->produtor->name}}  </td>
                        <td>
                            <img src="{{asset('assets/uploads/products/'. $item->image)}}" class="products-image" alt="Image Here">
                        </td>
                        <td>
                            <a href="{{url('edit-product/'.$item->id)}}" class="btn btn-primary">Editar</a>
                            <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-danger">Deletar</a>
                        </td>

                    </tr>
                    @endforeach
                </trbody>
            </table>
    </div>
</div>
@endsection
