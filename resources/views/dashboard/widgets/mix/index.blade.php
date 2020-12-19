@extends('dashboard.master')

@section('content')
@include('dashboard.partials.validator')

<div class="card">
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($groups as $g)
                    <tr>
                        <td>{{ $g->id }}</td>
                        <td>{{ $g->name }}</td>
                        <td>
                            <a class="btn btn-success text-white"
                                href="{{ route('mix.edit',$g->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>



{{ $groups->links() }}


@endsection
