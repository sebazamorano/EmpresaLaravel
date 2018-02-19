
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="{{ route('proveedores.update', $proveedor->id) }}">
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-lg-2" for="">Nombre</label>
                        <div class="col-lg-6">
                            <input class="form-control" name="nombre" type="text" value="{{ $proveedor->nombre }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" for="">Rut</label>
                        <div class="col-lg-6">
                            <input class="form-control" name="rut" type="text" value="{{ $proveedor->rut }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" for="">Direccion</label>
                        <div class="col-lg-6">
                            <input class="form-control" name="direccion" type="text" value="{{ $proveedor->direccion }}">
                        </div>
                    </div><div class="form-group">
                        <label class="col-lg-2" for="">Email</label>
                        <div class="col-lg-6">
                            <input class="form-control" name="email" type="text" value="{{ $proveedor->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" for="">Telefono</label>
                        <div class="col-lg-6">
                            <input class="form-control" name="telefono" type="text" value="{{ $proveedor->telefono }}">
                        </div>
                    </div><div class="form-group">
                        <label class="col-lg-2" for="">Giro</label>
                        <div class="col-lg-6">
                            <input class="form-control" name="giro" type="text" value="{{ $proveedor->giro }}">
                        </div>
                    </div>
                    <button class="btn btn-success">Guardar</button>
                </form>
            </div>
    </div>
    </div>
@endsection
