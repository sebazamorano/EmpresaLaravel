
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-body">
                <a href="{{ route('proveedores.create') }}" class="btn btn-success">Crear Proveedor</a>
                <hr>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Rut</th>
                        <th>Direccion</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Giro</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      {{-- Se recorre la variable proveedores  --}}
                    @foreach($proveedores as $proveedor)
                    <tr>
                        <th>{{ $proveedor->nombre }}</th>
                        <th>{{ $proveedor->rut }}</th>
                        <th>{{ $proveedor->direccion }}</th>
                        <th>{{ $proveedor->email }}</th>
                        <th>{{ $proveedor->telefono }}</th>
                        <th>{{ $proveedor->giro }}</th>
                        <th>
                            <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('proveedores.destroy', $proveedor->id)  }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                            <button class="btn btn-danger">Eliminar</button>
                            </form>
                        </th>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{-- Se imprimen los links del paginador--}}
                {{$proveedores->links()}}
            </div>
        </div>
    </div>
@endsection