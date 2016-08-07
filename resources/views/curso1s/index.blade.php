@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Curso1s</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('curso1s.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('curso1s.table')
        
@endsection
