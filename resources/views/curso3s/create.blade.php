@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New curso3</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'curso3s.store']) !!}

            @include('curso3s.fields')

        {!! Form::close() !!}
    </div>
@endsection
