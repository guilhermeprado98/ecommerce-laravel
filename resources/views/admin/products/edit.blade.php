@extends('layouts.admin')


@section('content')
<div class="card">
    <div class="card-body">
        <h3>Editar Produto</h3>
    </div>
    <div class="card-body">
        <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class= "row">
                <div class="col-md-12 mb-3">
                        <label for="">Categoria</label>
                        <select class="form-select" name="cate_id" aria-label="">
                            <option value="">Selecione a Categoria</option>
                            @foreach($category as $item)
                              <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                          </select>
                </div>
                <div class="col-md-12 mb-3">
                    <select class="form-select" name="afiliado_id" aria-label="">
                        <option value="">Selecione o Afiliado</option>
                        @foreach ($afiliados as $item)
                       <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach

                      </select>
            </div>
            <div class="col-md-12 mb-3">
                <select class="form-select" name="produtor_id" aria-label="">
                    <option value="">Selecione o Produtor</option>
                    @foreach ($produtores as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                       @endforeach
                  </select>
            </div>
                <div class="col-md-6 mb-3">
                    <label for="">Nome</label>
                    <input type="text" value="{{$products->name}}" class="form-control" name="name">
                </div>
            <div class="col-md-12 mb-3">
                <label for="">Descrição</label>
                <textarea name="description" cols="30" rows="5" class="form-control" >{{$products->description}}</textarea>
            </div>
            <div class="col-md-12">
                <label for="">Preço Original</label>
                <input type="number" value="{{$products->original_price}}" class="form-control" name="original_price">
            </div>
            @if($products->image)
            <img src="{{asset('assets/uploads/products/'.$products->image)}}" alt="" width="150px">
            @endif
            <div class="col-md-12 mb-3">
                <input type="file" class="form-control" name="image">
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Editar Produto</button>
            </div>

        </div>
        </form>
    </div>
</div>
@endsection
