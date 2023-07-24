@extends('layouts.admin')
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Lista de Produtos</h4>
        <hr>
    </div>

    <div class="card-body">
        <table id="products-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Afiliado</th>
                    <th>Produtor</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    jQuery.noConflict();

    jQuery(document).ready(function () {
        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("products.data") }}', // Replace with the URL that handles AJAX request for data
            columns: [
                { data: 'id', name: 'id' },
                { data: 'category.name', name: 'category.name' },
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'original_price', name: 'original_price' },
                { data: 'afiliado.name', name: 'afiliado.name' },
                { data: 'produtor.name', name: 'produtor.name' },
                {
                    data: 'image',
                    name: 'image',
                    render: function (data, type, full, meta) {
                        return '<img src="{{ asset("assets/uploads/products") }}/' + data + '" class="products-image" alt="Image Here">';
                    },
                },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
        });
    });
</script>
@endsection
