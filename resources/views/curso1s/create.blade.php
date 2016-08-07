@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New Curso1</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'curso1s.store']) !!}

            @include('curso1s.fields')

        {!! Form::close() !!}
    </div>
@endsection
