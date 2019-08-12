@extends('layouts.default')

@section('content')
<div class="title m-b-md">
	<h1>Find your shortened URL below</h1>
	<a href="{{ config('app.url') }}/{{ $shortened }}">
		{{ config('app.url') }}/{{ $shortened }}
	</a>
</div>
@stop