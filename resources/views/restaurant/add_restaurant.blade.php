@extends('layout')

@section('title', 'ADD RESTAURANT')

@section('content')		
	<h1>
		Insert a new restaurant in DB!
	</h1>
	
	@if(Session::has("message"))
		<p class="alert alert-info">{{ Session::get("message") }}</p>
	@endif
	<div>
	</div>
	<form action="{{ route('saveRestaurant') }}" method="POST" id="addRestaurant">
		@csrf
		<div class="container"> 
			<p>Restaurant name:</p>
			<input type="text" id="name" name="name">
			<p>Restaurant description:</p>
			<textarea cols="30" rows="10" id="description" name="description"></textarea>
			<p>Restaurant adress:</p>
			<input type="text" id="address" name="address">
			<p>Restaurant email:</p>
			<input type="email" id="email" name="email">
			<p>Restaurant phone:</p>
			<input type="phone" id="phone" name="phone"> </br>
			<p></p>
			<button type="submit" id="submit" class="btn btn-success">SUBMIT</button>
		</div>
	</form>

@endsection
