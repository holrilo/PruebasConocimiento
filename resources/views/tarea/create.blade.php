@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{ url('/tarea') }}" method="post">
            @csrf
            @include('tarea.form',['accion'=>'Crear'])
        </form>
    </div>

@endsection
