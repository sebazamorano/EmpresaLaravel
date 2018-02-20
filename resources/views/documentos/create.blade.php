
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-horizontal" method="post" action="{{ route('documentos.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-lg-2" for="">Numero</label>
                        <div class="col-lg-6">
                            <input class="form-control" name="numero" type="number" value="{{ old('numero') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" for="">Tipo Documento</label>
                        <div class="col-lg-6">
                            <select name="tipo_documento_id" id="" class="form-control">
                                <option value="">Selecciona Tipo Documento..</option>
                                @foreach($tipoDocumentos as $tipoDocumento)
                                    <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" for="">Proveedor</label>
                        <div class="col-lg-6">
                            <select name="proveedor_id" id="" class="form-control">
                                <option value="">Selecciona Proveedor</option>
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" for="">Forma de Pago</label>
                        <div class="col-lg-6">
                            <input class="form-control" name="forma_pago" type="text" value="{{ old('forma_pago') }}">
                        </div>
                    </div>

                    <button class="btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection