@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit curso3</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($curso3, ['route' => ['curso3s.update', $curso3->id], 'method' => 'patch']) !!}

            @include('curso3s.fields')

            {!! Form::close() !!}
        </div>
@endsection
