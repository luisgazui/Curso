@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Curso1</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($curso1, ['route' => ['curso1s.update', $curso1->id], 'method' => 'patch']) !!}

            @include('curso1s.fields')

            {!! Form::close() !!}
        </div>
@endsection
