@extends('dashboard.master')

@section('content')
    @include('dashboard.partials.validator')

    <div class="card">
        <div class="card-header">
            Crear Texto
        </div>

        <div class="card-body">
            <form action="{{route("text.store")}}" method="POST">
                @include('dashboard.widgets.text._form')
                <button class="btn btn-success mt-2" type="submit">Enviar</button>
            </form>
        </div>
    </div>