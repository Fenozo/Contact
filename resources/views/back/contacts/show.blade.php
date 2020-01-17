@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <a class="navbar-brand" href="{{ route('add_contact') }}">Add</a> 
                        <span style="font-size: 14px;">contact</span>
                    </h3>
                </div>

                <div class="card-body">
                    <p>{{ $contact->pays }}</p>
                    <p>{{ $contact->ville }}</p>
                    <p>{{ $contact->email }}</p>
                    <p>{{ $contact->telephone }}</p>
                    <p>{{ $contact->adresse }}</p>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection