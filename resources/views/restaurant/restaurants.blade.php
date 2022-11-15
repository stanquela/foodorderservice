@extends('layouts.app')

@section('title', 'RESTAURANTS')

@section('content')		
	
	<div>
		@if(Session::has('message'))
			<p class="alert alert-info">{{ Session::get('message') }} </p>
		@endif
	</div>

		<h1>
			Pick your ideal restaurant!
		</h1>
		<div>
			
		</div>
		@foreach($restaurant['data'] as $single)
			<div>{{ $single['name'] }}</div>
			<div>{{ $single['description'] }}</div>
			<a href=" {{ route('showRestaurant', $single['id']) }} ">Read more...</a>
		@endforeach
		
		
@endsection
