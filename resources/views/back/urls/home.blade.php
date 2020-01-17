@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <h3>
                        <a class="navbar-brand" href="{{ route('add_url') }}">Add</a>
                        <span>URL</span>
                   </h3>
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        @foreach($urls as $url)
                            <li class="card">
                                <div class="card-body">
                                    <h3>{{ $url->url }}</h3>
                                    <p>{{ $url->title }}</p>
                                    <p>{{ $url->created_at }}</p>
                                    <div class="edit">
                                        <a href="{{ route('edit_url', ['id' => $url->id]) }}">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <br>
                        @endforeach 
                    </ul>                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
