
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-body">
                <a href="{{ route('usuarios.create') }}" class="btn btn-success">Crear Usuario</a>
                <hr>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- Se recorre la variable proveedores  --}}
                    @foreach($usuarios as $usr)
                        <tr>
                            <th>{{ $usr->name }}</th>
                            <th>{{ $usr->email }}</th>
                            <th>
                                <a href="{{ route('usuarios.edit', $usr->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('usuarios.destroy', $usr->id)  }}" method="post">
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
                {{-- $usuarios->links() --}}
            </div>
        </div>
    </div>
@endsection