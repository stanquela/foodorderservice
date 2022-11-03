@extends('layout')

@section('title', 'EDIT RESTAURANT')

@section('content')		
	<h1>
		Edit data for the restaurant: {{ $data['name'] }}!
	</h1>
	
	@if(Session::has("message"))
		<p class="alert alert-info">{{ Session::get("message") }}</p>
	@endif
	<div>
	</div>
	<form action="{{ route('saveEditRestaurant', $data['id']) }}" method="POST" id="saveEditRestaurant">
		@csrf
		<div class="container"> 
			<p>Restaurant name:</p>
			<input type="text" id="name" name="name" value="{{ $data['name'] }}">
			<p>Restaurant description:</p>
			<textarea cols="30" rows="10" id="description" name="description">{{ $data["description"] }}</textarea>
			<p>Restaurant adress:</p>
			<input type="text" id="address" name="address" value="{{ $data['address'] }}">
			<p>Restaurant email:</p>
			<input type="email" id="email" name="email" value="{{ $data['email'] }}">
			<p>Restaurant phone:</p>
			<input type="phone" id="phone" name="phone" value="{{ $data['phone'] }}"> </br>
			<p></p>
			<button type="submit" id="submit" class="btn btn-success">SUBMIT</button>
		</div>
	</form>

@endsection
