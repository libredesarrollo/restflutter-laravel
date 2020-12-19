@extends('dashboard.master')

@section('content')
    @include('dashboard.partials.validator')

    <div class="card">
        <div class="card-header">
            Crear botón
        </div>

        <div class="card-body">
            <form action="{{route("button.store")}}" method="POST">
                @include('dashboard.widgets.button._form')
                <button class="btn btn-success mt-2" type="submit">Enviar</button>
            </form>
        </div>
    </div>

@endsection