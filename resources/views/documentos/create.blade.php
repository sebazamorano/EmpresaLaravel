
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            <documento :tipo-documentos="{{ $tipoDocumentos }}" :proveedores="{{ $proveedores }}"></documento>

        </div>
    </div>
@endsection