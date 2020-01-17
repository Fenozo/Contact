@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <a class="navbar-brand" href="{{ route('add_contact') }}">Add</a> 
                        <span style="font-size: 16px;">Contacts</span>
                    </h3>
                </div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        @foreach($contacts as $contact)
                            <li class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>{{ $contact->telephone }}</h3>
                                        </div>
                                        <div class="col-md-8">
                                        <?php $objet = $contact->personne()->getResults(); ?>
                                        @if($objet)
                                            <p style="">
                                        @else
                                            <p style="">
                                        @endif
                                            
                                            @if ($objet)
                                                <span class="box-right">
                                                    {{ $objet->name }}  {{ $objet->prename }} 
                                                </span>
                                                <br>
                                            @endif
                                            <span class="box-right block">
                                                {{ $contact->pays }}
                                            </span>
                                            <span class="box-right block">
                                                {{ $contact->ville }}
                                            </span>
                                            <span class="box-right block">
                                                {{ $contact->adresse }}
                                            </span>
                                            @if ($contact->email)
                                            <span class="box-right email">
                                                {{ $contact->email }}
                                            </span>
                                            @endif
                                            @if ($objet) 
                                            
                                                @if($objet->cin)
                                                <br>
                                                <span style="font-weight:600;color:#8a8787;font-size:22px;">
                                                {{ number_format($objet->cin,0,  '', '-') }}
                                                </span>
                                                </p>
                                                @else
                                                <span class="box-right" style="color:red;"> Sans CIN </span>
                                                @endif
                                            @else 
                                                </p>
                                            @endif
                                        </div>
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