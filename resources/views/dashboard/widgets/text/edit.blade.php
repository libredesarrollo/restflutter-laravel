@extends('dashboard.master')

@section('content')
    @include('dashboard.partials.validator')

    <div class="card">
        <div class="card-header">
            Actualizar text: <strong>{{ $text->label }}</strong>
        </div>

        <div class="card-body">
            <form action="{{route("text.update",$text->id)}}" method="POST">
                @method('PATCH')
                @include('dashboard.widgets.text._form')
                <button class="btn btn-success mt-2" type="submit">Actualizar</button>
            </form>
        </div>
    </div>

@endsection