
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-body">
                <a href="{{ route('categoria.create') }}" class="btn btn-success">Crear Categoria</a>
                <hr>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nopmbre</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- Se recorre la variable proveedores  --}}
                    @foreach($categorias as $categoria)
                        <tr>
                            <th>{{ $categoria->nombre }}</th>
                            <th>
                                <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('categoria.destroy', $categoria->id)  }}" method="post">
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
               {{-- {{$categoria->links()}} --}}
            </div>
        </div>
    </div>
@endsection