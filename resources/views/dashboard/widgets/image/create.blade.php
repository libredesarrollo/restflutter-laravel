
@extends('dashboard.master')

@section('content')
    @include('dashboard.partials.validator')

    <div class="card">
        <div class="card-header">
            Crear Imagen
        </div>

        <div class="card-body">
            <form action="{{route("image.store")}}" method="POST" enctype="multipart/form-data">
                @include('dashboard.widgets.image._form')
                <button class="btn btn-success mt-2" type="submit">Enviar</button>
            </form>
        </div>
    </div>

@endsection