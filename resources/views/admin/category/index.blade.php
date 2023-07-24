@extends('layouts.admin')


@section('content')
<div class="card">
    <div class="card-header">

        <h4>Categorias dos Produtos</h4>
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
                            Nome
                        </th>
                        <th>
                            Descrição
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
                    @foreach($category as $item)
                    <tr>
                        <td>{{$item->id}} </td>
                        <td>{{$item->name}}  </td>
                        <td>{{$item->description}}  </td>
                        <td>
                            <img src="{{asset('assets/uploads/category/'. $item->image)}}" class="cate-image" alt="Image Here">
                        </td>
                        <td>
                            <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-primary">Editar</a>
                            <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-danger">Deletar</a>
                        </td>

                    </tr>
                    @endforeach
                </trbody>
            </table>
    </div>
</div>
@endsection
