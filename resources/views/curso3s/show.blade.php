@extends('layouts.app')

@section('content')
    @include('curso3s.show_fields')

    <div class="form-group">
           <a href="{!! route('curso3s.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
