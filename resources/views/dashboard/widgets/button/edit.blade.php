@extends('dashboard.master')

@section('content')
    @include('dashboard.partials.validator')

    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Actualizar Botón: <strong>{{ $button->name }}</strong>
                </div>
        
                <div class="card-body">
                    <form action="{{route("button.update",$button->id)}}" method="POST">
                        @method("PATCH")
                        @include('dashboard.widgets.button._form')
                        <button class="btn btn-success mt-2" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
        @include('dashboard.behavior._save',['label'=> $button->label,"widget"=>$button,'type'=> "button"])
    </div>


@endsection