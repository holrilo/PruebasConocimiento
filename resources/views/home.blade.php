@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- {{ __('You are logged in!') }} --}}
                        <div class="jumbotron">
                            <h1 class="display-3">Tareas</h1>
                            <p class="lead">Administrador De taras (Crea, Edita, Borra)</p>
                            <hr class="my-2">
                            <p></p>
                            <p class="lead">
                                <a class="btn btn-primary btn-lg" href="/tarea" role="button">Mira La Lista</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
