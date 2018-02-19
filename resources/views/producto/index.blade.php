
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-body">
                <a href="{{ route('productos.create') }}" class="btn btn-success">Crear Producto</a>
                <hr>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- Se recorre la variable Productos  --}}
                    @foreach($productos as $producto)
                        <tr>
                            <th>{{ $producto->nombre }}</th>
                            <th>{{ $producto->precio }}</th>
                            <th>
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->id)  }}" method="post">
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
                {{--$productos->links() --}}
            </div>
        </div>
    </div>
@endsection