@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">
                    <h3>
                        <a href="{{ route('back_personne_add') }}">Add</a>
                        <span>Personne</span>
                        <input class="form-control" type="" id="search_input_personne">
                    </h3>
                </div>
                <div class="card-body">

                    <ul class="items" data-from="{{ $from }}">
                        <!-- @foreach($personnes as $personne)
                            <li class="card">
                                <div class="card-body">
                                    <h3>{{ $personne->name }}</h3>
                                    <p>{{ $personne->prename }}</p>
                                    <p>{{ $personne->date_naissance }}</p>
                                    <p>
                                        @if ($from === 'contact')
                                        <a href="{{ route('add_contact', ['personne'=> $personne->id]) }}">
                                            choisir
                                        </a>
                                        @endif
                                    </p>
                                    <p>
                                        <a href="{{ route('back_personne_show', ['id'=> $personne->id]) }}">
                                            Voir
                                        </a>
                                    </p>
                                </div>
                            </li>
                            <br>
                      
                        @endforeach -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    
    
    <script type="text/javascript">

        $(function(e) {

            var personne_url = "{{ route('back_personne_ajax_index') }}";

            var click_by_url = function (personne) 
            {
                if (!personne.hasOwnProperty("url_by_personne")) {
                        console.error('Error la clé [url_by_personne] n\'existe pas dans (personne)');
                        return ;
                    }

                if ($('.items').attr('data-from')!= undefined) {

                    if ($('.items').attr('data-from') === 'contact') {
                        console.log('Oui vous voulez creer un nouveau contact')
                       return '<div><a href="'+personne["url_by_personne"]+'"> choisir</a></div>';
                    }
                }
                    if (!personne.hasOwnProperty("url_by_id")) {
                        return ;
                    }

                return '<a href="'+personne["url_by_id"]+'">Voir</a>';
            }

            var load_personne_list = function(response)
            {
                for(id in response) {
                        var name = (response[id].name)? response[id].name: '';
                        var url_by_id = response[id].url_by_id

                        $('.items').append('<li class="card">'+
                            '<div class="card-body">'+'<h3>'+
                             name+ ' '+ response[id].prename+
                            '</h3>'+
                            click_by_url(response[id]) +
                            
                            '</div>'+
                            '</li><br>');
                        // console.log(response[id].name + ' '+ response[id].prename)

                        // console.log(response[id].url_by_id)

                    };
            }

            var search_input_personne = $('#search_input_personne')
            .on( 'keyup', function(event) {
                event.preventDefault()
                console.log($(this).val())

                $.ajax({
                    method: 'GET',
                    'url' : "{{ route('back_personne_ajax_index')}}",
                    data: {'find_by_name': $(this).val()},
                    'dataType' : 'json',
                    success: function(response) {
                        $('.items').html('');
                        console.log('--'+response)
                        load_personne_list(response);
                    }
                });
            });
            
                $.ajax({
                    method: 'GET',
                    'url' : personne_url,
                    'dataType' : 'json',
                    success: function(response) {
                        load_personne_list(response);
                    }
                });


            
            
        });

    </script>

@endsection