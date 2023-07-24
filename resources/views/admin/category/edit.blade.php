@extends('layouts.admin')


@section('content')
<div class="card">
    <div class="card-body">
        <h3>Editar Categoria</h3>
    </div>
    <div class="card-body">
        <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class= "row">
                <div class="col-md-6">
                    <label for="">Nome</label>
                    <input type="text" value="{{$category->name}}" class="form-control" name="name">
                </div>
                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" value="{{$category->slug}}" class="form-control" name="slug">
                </div>
            <div class="col-md-12">
                <label for="">Descrição</label>
                <textarea name="description" cols="30" rows="5" class="form-control" > {{$category->description}}</textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Título</label>
                <input type="text" value="{{$category->meta_title}}" class="form-control" name="meta_title">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keywords" cols="30" rows="5" class="form-control" >{{$category->meta_keywords}}</textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label for="">Meta Descrição</label>
                <textarea name="meta_description" cols="30" rows="5" class="form-control" >{{$category->meta_descrip}}</textarea>
            </div>

            @if($category->image)
                <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="Imagem da Categoria">
            @endif
            <div class="col-md-12">
                <input type="file" class="form-control" name="image">
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Editar Categoria</button>
            </div>

        </div>
        </form>
    </div>
</div>
@endsection
