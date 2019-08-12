@extends('layouts.default')

@section('content')
    

    <div class="title m-b-md">
        <h1>URL shortener</h1>
        <form method="post" action="{{ route('url_store') }}">

            {{ csrf_field() }}

            <input name="url" class="input form-control" value="{{ old('url') }}"></input>
            {!! $errors->first('url', '<p class="error-msg">:message</p>') !!}
        </form>
    </div>

@stop

