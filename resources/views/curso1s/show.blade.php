@extends('layouts.app')

@section('content')
    @include('curso1s.show_fields')

    <div class="form-group">
           <a href="{!! route('curso1s.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
