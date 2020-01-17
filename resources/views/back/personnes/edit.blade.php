@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <span style="font-size: 14px;">Création de nouvelle personne</span>
                    </h3>
                </div>

                <div class="card-body">
                        {!! $form->start($endpoint) !!}

                        {!! $form->input('name', 'Nom') !!}

                        {!! $form->input('prename', 'Prénom') !!}
                        
                        {!! $form->input('date_naissance', 'Date de naissance') !!}

                        {!! $form->input('lieu_naissance', 'Lieu de naissance') !!}

                        {!! $form->input('cin', 'Numéro CIN') !!}

                        {!! $form->input('date_livraison_cin', 'Date de livraison du CIN') !!}

                        <div class="form-actions">
                            <button type="submit" class="btn btn-info">
                                Enregistrer
                            </button>
                        </div>

                        {!! $form->end() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection