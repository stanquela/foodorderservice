@extends('layouts.app')

@section('title', 'RESTAURANTS')

@section('content')		
	
	<div>
		@if(Session::has('message'))
			<p class="alert alert-info">{{ Session::get('message') }} </p>
		@endif
	</div>

		<h1>
			These are all orders!
		</h1>
		<div>
			
		</div>
		@foreach($orders['data'] as $single)
			<div>Order id: {{ $single['order_id'] }}</div>
            <div>User id: {{ $single['user_id'] }}</div>
            <div>Price: {{ $single['price'] }}</div>
            <div>Details: {{ $single['details'] }}</div>
			<div>Status: {{ $single['status'] }}</div>
			<!-- <a href=" {{ route('showRestaurant', $single['id']) }} ">Read more...</a>-->
		@endforeach
		
		
@endsection
