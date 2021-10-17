@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{ url('/tarea/' . $tarea->id) }}" method="post">
            @csrf
            {{ method_field('PATCH') }}
            @include('tarea.form',['accion'=>'Editar'])
        </form>
    </div>

@endsection
