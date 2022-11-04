@extends('layout')

@section('title', 'ADD MEAL')

@section('content')		
	<h1>
		Insert a new meal in DB!
	</h1>
	
	@if(Session::has("message"))
		<p class="alert alert-info">{{ Session::get("message") }}</p>
	@endif
	<div>
	</div>
	<form action="{{ route('saveMeal') }}" method="POST" id="addMeal">
		@csrf
		<div class="container"> 
			<p>Restaurant id:</p>
            <input type="text" id ="restaurant_id" name="restaurant_id">
            <p>Meal name:</p>
			<input type="text" id="name" name="name">
			<p>Meal description:</p>
			<textarea cols="30" rows="10" id="description" name="description"></textarea>
			<p></p>
			<button type="submit" id="submit" class="btn btn-success">SUBMIT</button>
		</div>
	</form>

@endsection
