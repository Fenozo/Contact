@extends('layouts.app')

@section('content')

<div class="container content">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3>New Url</h3>
                </div>
                
                <div class="card-body">
                    <form method="post" action="{{ $endpoint }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">TITLE</label>
                            <input type="text" name="title" value="{{ $url->title }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">URL</label>
                            <input type="text" name="url" value="{{ $url->url }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-content form-control">{{ $url->description }}</textarea>
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
    </div>
</div>

@endsection

