@extends('layout')

@section('title', 'MEALS')

@section('content')		
	
	<div>
		@if(Session::has('message'))
			<p class="alert alert-info">{{ Session::get('message') }} </p>
		@endif
	</div>

		<h1>
			Pick your ideal Meal!
		</h1>
		<div>
			
		</div>
		@foreach($meal['data'] as $single)
            <div>{{ $single['restaurant_id'] }}</div>			
            <div>{{ $single['name'] }}</div>
			<div>{{ $single['description'] }}</div>
			<a href=" {{ route('showMeal', $single['id']) }} ">Read more...</a>
		@endforeach
		
		
@endsection
