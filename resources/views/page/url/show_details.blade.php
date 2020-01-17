@extends('layouts.default')

@section('content')

<div class="container content">

	<div class="row">
		<div class="col-md-8">
			<div class="actions">
	        	
	        	<a style="margin-left: 22px;" href="{{ route('show_url_list') }}">
	        		retour à la liste Urls
	        	</a>

	        	<a style="margin-left: 22px;" href="{{ route('document_create', ['url_id'=>$data->id]) }}">
	        		créer un document lié
	        	</a>
	        </div>
			<h1> <a href="{{ $data->url }}">{{ $data->title }}</a> </h1>
			<p >{{ $data->id }}</p>
			<em class="">{{ $data->created_at->fromNow() }}</em>
			<p class="style-date">{{ $data->created_at->calendar() }}</p>
			<p >
			{{ $data->shortened }}
			</p>
			<p><a href="{{ $data->url }}">{{ $data->url }} </a></p>
		</div>
		<div class="col-md-4">
			<h1> <a href="{{ $data->url }}">{{ $data->url }}</a> </h1>
			@foreach( $documentations as $doc)
				<div class="" style="border:2px solid; padding:5px;">
					@if ($doc->title == null)
						<h2>Annonyme</h2>
					@else
						<h2 style="font-size: 18px">{{ $doc->title }}</h2>
					@endif
					<div class="style-date">
						{{ $doc->created_at}}
					</div>
				</div>
			@endforeach

			
		</div>
	</div>
    
</div>

@endsection

