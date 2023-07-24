@extends('layouts.admin')


@section('content')
<div class="card">
    <div class="card-body">
        <h3>Cadastro de Afiliados</h3>
    </div>
    <div class="card-body">
        <form action="{{ url('insert_afiliado') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class= "row">

                <div class="col-md-6 mb-3">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="name">
                </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Criar Afiliado</button>
            </div>

        </div>
        </form>
    </div>
</div>
@endsection
