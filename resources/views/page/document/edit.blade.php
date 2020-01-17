@extends('layouts.default')

@section('content')

<div class="container content">
<div class="row">
    <div class="col-md-5">
        <h1> <a href="{{ $url->url }}">{{ $url->url }}</a> </h1>
        <form method="post" action="{{ $endpoint }}">
            {{ csrf_field() }}
            <input type="hidden" name="url_id" value="{{ $url->id }}">
            <div class="form-group">
                <label for="">TITLE</label>
                <input type="text" name="title" value="{{ $document->title }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" class="form-content form-control">{{ $document->content }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-info">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection
