
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
                <form class="form-horizontal" method="post" action="{{ route('productos.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-lg-2" for="">Nombre</label>
                        <div class="col-lg-6">
                            <input class="form-control" name="nombre" type="text" value="{{ old('nombre') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" for="">Precio</label>
                        <div class="col-lg-6">
                            <input class="form-control" name="precio" type="text" value="{{ old('precio') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" for="">Categorias</label>
                        <div class="col-lg-6">
                            <select class="form-control" name="categorias[]" id="" multiple>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection