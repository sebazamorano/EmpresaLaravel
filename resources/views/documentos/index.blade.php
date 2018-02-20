
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-body">
                <a href="{{ route('documentos.create') }}" class="btn btn-success">Crear Documento</a>
                <hr>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numero</th>
                        <th>Tipo Documento</th>
                        <th>Proveedor</th>
                        <th>Usuario</th>
                        <th>Forma de Pago</th>
                        <th>Neto</th>
                        <th>IVA</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($documentos as $documento)
                    <tr>
                        <td>{{ $documento->id }}</td>
                        <td>{{ $documento->numero }}</td>
                        <td>{{ $documento->tipo_documento_id }}</td>
                        <td>{{ $documento->proveedor_id }}</td>
                        <td>{{ $documento->user_id }}</td>
                        <td>{{ $documento->forma_pago }}</td>
                        <td>{{ $documento->neto }}</td>
                        <td>{{ $documento->iva }}</td>
                        <td>{{ $documento->total }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection