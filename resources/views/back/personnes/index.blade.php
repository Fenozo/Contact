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
                        <div class="badge badge-danger" id="datas">0</div>
                        <div class="badge badge-danger" id="per_page">0</div>
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

                    <div class="container paginations">
                        <div class="row">
                            <ul class="pagination" id="dom_paginator" role="navigation">
                                
                            </ul>
                        </div>
                    </div>
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

            var paginator = function(datas) {
         
                var current_page = datas.current_page;

                    var link    = '';
                    var limit   = datas.last_page;
                    var first_limit = 3;
                    var c = 0;

                    for(var i = 1; i <= limit; i++) {

                        if (first_limit < current_page) {
                            // console.log(current_page+ ' limit est inférieur à current');
                            if (i>1 && i < current_page-2 ) {
                                        if (c === 0) {
                                            link +='<li class="page-item">'+
                                            '<a class="page-link" href="">..</a>'+
                                            '</li>';
                                            c++;
                                        }
                                    }else {
                                            if (i > current_page+1) {
                                                if (c === 1) {
                                                    link +='<li class="page-item">'+
                                                    '<a class="page-link" href="">..</a>'+
                                                    '</li>';
                                                    c++;
                                                }
                                            }else

                                            if (current_page == i) {
                                                link +=  '<li class="page-item active" aria-current="page"><span class="page-link">'+i+'</span></li>';
                                            } else {
                                                
                                                    link +='<li class="page-item">'+
                                                    '<a class="page-link" href="'+i+'">'+i+'</a>'+
                                                    '</li>';
                                                }
                                        }
                        } else {
                                if (i <= (first_limit) - 1 +(current_page)) {
                                    if (current_page == i) {
                                        link +=  '<li class="page-item active" aria-current="page"><span class="page-link">'+i+'</span></li>';
                                    } else {
                                            link +='<li class="page-item">'+
                                            '<a class="page-link" href="'+i+'">'+i+'</a>'+
                                            '</li>';
                                        }
                                }else {
                                        link +='<li class="page-item">'+
                                        '<a class="page-link" href="">..</a>'+
                                        '</li>';
                                        break;
                                    }
                            }
                    }
                        var c =0;
                        if (limit > (first_limit*2)) {
                            for(var i = 1; i<= limit ; i++) {
                                
                                if (i> (limit-first_limit+current_page) && c <= limit) {

                                    link +='<li class="page-item">'+
                                    '<a class="page-link" href="'+(i)+'">'+(i)+'</a>'+
                                    '</li>';

                                    c++;
                                    continue;
                                }
                                
                            }
                        }


                if(datas.prev_page_url != null){
                    
                    var url_first = datas.prev_page_url.split('=');

                    var first = 
                    '<li class="page-item  aria-disabled="false" aria-label="« Previous">'+'<a class="page-link" href="'+url_first[1]+'" rel="next" aria-label="Next »">‹</a>'+
                    '</li>';
                }else {
                    var first = 
                        '<li class="page-item disabled" aria-disabled="true" aria-label="« Previous">'+
                            '<span class="page-link" aria-hidden="true">‹</span>'+
                        '</li>';
                }
                
                if (datas.next_page_url != null) {
                    var url_end = datas.next_page_url.split('=');

                    if (url_end[1] >= datas.last_page) {
                        var end = 
                        '<li class="page-item disabled" aria-disabled="true">'+
                            '<span class="page-link" aria-hidden="true">›</span>'+
                        '</li>';
                    }else {
                            var end = 
                            '<li class="page-item">'+
                            '<a class="page-link" href="'+url_end[1]+'" rel="next" aria-label="Next »">›</a>'+
                            '</li>';
                        }

                }else {
                    var end = 
                    '<li class="page-item disabled" aria-disabled="true">'+
                        '<span class="page-link" aria-hidden="true">›</span>'+
                    '</li>';
                }

                    
                return first + link + end;
            }

            function paginate_link (page_url)
            {
                return '<li class="page-item">'+
                        '<a class="page-link" href="'+page_url+'">2</a>'+
                    '</li>';
            }

            var load_personne_list = function(datas)
            {
                var data = datas['data'];
                var count_page = 0;
                if (datas.last_page == null) {
                    count_page = 0;
                }else {
                    count_page = datas.last_page+'/'+datas.total;
                }
                
                $('#datas').html(count_page);
                $('#per_page').html('/'+datas.per_page);

                for(id in data) {
                        var name = (data[id].name)? data[id].name: '';
                        var url_by_id = data[id].url_by_id

                        $('.items').append('<li class="card">'+
                                '<div class="card-body">'+
                                    '<h3>'+
                                     name+ ' '+ data[id].prename+
                                    '</h3>'+
                                    click_by_url(data[id]) +
                            
                                '</div>'+
                            '</li>'+
                            '<br>');

                    };
                $('#dom_paginator').html(paginator(datas));

                 $('.page-link').on('click',document, function (event) {
                        event.preventDefault();
                        var href = $(this).attr('href');

                        if (href === undefined) {
                            return;
                        }

                        $.ajax({
                            method: 'GET',
                            'url' : "{{ route('back_personne_ajax_index')}}",
                            data: {'find_by_name': $('#search_input_personne').val(), 'page': href},
                            'dataType' : 'json',
                            success: function(data) {
                                $('.items').html('');
                                load_personne_list(data);
                            }
                        });
                        
                    });
            }

            $('#search_input_personne').on( 'keyup', function(event) {
                event.preventDefault()
                $.ajax({
                    method: 'GET',
                    'url' : "{{ route('back_personne_ajax_index')}}",
                    data: {'find_by_name': $(this).val()},
                    'dataType' : 'json',
                    success: function(data) {
                        $('.items').html('');
                        load_personne_list(data);
                    }
                });
            });
            
            $.ajax({
                method: 'GET',
                'url' : personne_url,
                'dataType' : 'json',
                success: function(data) {
                    load_personne_list(data);
                }
            });

        });

    </script>

@endsection