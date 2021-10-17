@extends('layouts.app')

@section('content')

    <div class="container">

        <a href="{{ url('tarea/create') }}" class="btn btn-success">Crear Nueva Tarea</a>
        <br>
        <br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Nombre Tarea</th>
                    <th>Descripcion Tarea</th>
                    <th>Fecha Creacion</th>
                    <th>Estado</th>
                    <th>Fecha Vencimiento</th>
                    <th>Usuario Creacion</th>
                    <th> ¿? </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tareas as $tarea)
                    <tr>
                        <td scope="row">{{ $tarea->id }}</td>
                        <td>{{ $tarea->nombre_tariea }}</td>
                        <td>{{ $tarea->descripcion_tarea }}</td>
                        <td>{{ $tarea->fecha_creacion }}</td>
                        <td>{{ $tarea->estado_tarea }}</td>
                        <td>{{ $tarea->fecha_vencimiento }}</td>
                        <td>{{ $tarea->usuario }}</td>
                        <td >
                            <a href="{{ url('/tarea/' . $tarea->id . '/edit') }}" class="btn btn-warning d-inline">Editar</a>
                            <form action="{{ url('/tarea/' . $tarea->id) }}" method="post" class="d-inline" >
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('Quieres Borrar?')"
                                    value="Borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
