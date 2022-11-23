@extends('layouts.app')

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
			<!--<p>Restaurant id:</p>
            <input type="text" id ="restaurant_id" name="restaurant_id">-->
            <select class="form-control m-bot15" name="restaurant_id">
                @if ($restaurants->count())
                    @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>    
                    @endforeach
                @endif

            </select>

            <p>Meal name:</p>
			<input type="text" id="name" name="name">

			<p>Meal description:</p>
			<textarea cols="30" rows="10" id="description" name="description"></textarea>

            <p>Meal price:</p>
			<input type="number" id="price" name="price">

			<p></p>
			<button type="submit" id="submit" class="btn btn-success">SUBMIT</button>
		</div>
	</form>

@endsection
