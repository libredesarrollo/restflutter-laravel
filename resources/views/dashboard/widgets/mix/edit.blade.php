@extends('dashboard.master')

@section('content')
    @include('dashboard.partials.validator')

    <div class="card">
        <div class="card-header">
            Gestionar {{ $group->name }}
        </div>

        <div class="card-body">
                @include('dashboard.widgets.mix._form')
        </div>
    </div>

@endsection