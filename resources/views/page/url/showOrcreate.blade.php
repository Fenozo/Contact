@extends('layouts.default')

@section('content')
    
    <div class="container">

        <h1>{{ config('specific.app_name') }}</h1>
        <div class="actions">
        <a href="{{ route('add_url') }}" class="btn btn-info">Nouveau</a>
        </div>
        <form method="get" action="{{ route('show_url_list') }}">

        {{-- csrf_field()   --}}

        <input name="url" class="input form-control" value="{{ $finding }}" placeholder="Please enter your original url here"></input>
        {!! $errors->first('url', '<p class="error-msg">:message</p>') !!}
        </form>
    </div>

    <div class="">
        
            <div class="container content">
                <div class="row">
                    @foreach($url_list as $url)
                        <div class="col-md-9">
                            <article>
                                <h1>{{ $url->title }}</h1>
                                <div>
                                    <p>
                                        <a href="{{ $url->url }}"> {{ $url->url }} </a> 
                                    </p>
                                </div>
                                <div>
                                    <em>{{ $url->getCreatedAt()->fromNow() }}</em>
                                </div>
                                
                                <div class="edit">
                                    <a href="{{ route('edit_url', ['id'=> $url->id]) }}" style="color:#5bc0de;">editer</a>
                                    
                                </div>
                                <div  class="show">
                                        <a href="{{ route('show_details', ['id'=> $url->shortened]) }}" style="">show</a>
                                    </div>
                                <div class="style-date">
                                    <em>{{ $url->getCreatedAt()->calendar() }}</em>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="container paginations">
                <div class="row">

                    {{ $url_list->links() }}
                </div>
            </div>
    </div>

@stop