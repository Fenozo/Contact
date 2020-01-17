@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <span style="font-size: 14px;">Create new contact</span>
                    </h3>
                </div>

                <div class="card-body">
                        {!! $form->start($endpoint) !!}

                        {!! $form->getOtherFields() !!}

                        {!! $form->input('pays') !!}
                        
                        {!! $form->input('ville') !!}
                        
                        {!! $form->input('email') !!}

                        {!! $form->input('telephone') !!}

                        {!! $form->input('adresse') !!}

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