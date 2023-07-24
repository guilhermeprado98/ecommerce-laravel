@extends('layouts.admin')


@section('content')
<div class="card">
    <div class="card-header">

        <h4>Afiliados</h4>
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

                    </tr>
                </thead>
                <trbody>
                    @foreach($afiliados as $item)
                    <tr>
                        <td>{{$item->id}} </td>
                        <td>{{$item->name}}  </td>


                    </tr>
                    @endforeach
                </trbody>
            </table>
    </div>
</div>
@endsection
