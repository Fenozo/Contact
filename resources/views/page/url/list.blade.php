@extends('layouts.default')

@section('content')

<div class="title m-b-md">
    <h1>Url finder</h1>
  
    @foreach($urls as $url)
    <article>
            <h2>{{ $url->url }}</h2>
            <div class="href">
                <a href="{{ $url->url }}">{{ $url->shortened }}</a>
            </div>
            <div class="list-actions">
                
            </div>
    </article>
    @endforeach

</div>

@stop