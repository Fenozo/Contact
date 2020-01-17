@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <a class="navbar-brand" href="{{ route('back_personne_add') }}">Add</a> 
                        <span style="font-size: 14px;">
                            <a href="{{ route('back_personnes') }}">personne</a>
                        </span>
                    </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p>{{ $personne->name }}</p>
                            <p>{{ $personne->prename }}</p>
                            <p>{{ $personne->date_naissance }}</p>
                            <p>{{ $personne->lieu_naissance }}</p>
                            <p>{{ $personne->cin }}</p>
                            <p>{{ $personne->date_livraison_cin }}</p>
                        </div>
                        <div class="col-md-8">
                        @if (count($personne->contacts) > 0)
                            {{ count($personne->contacts) }}
                        @else
                            <p>Vide pour le moment</p>
                        @endif
                        </div>
                    </div>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection