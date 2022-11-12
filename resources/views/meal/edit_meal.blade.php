@extends('layout')

@section('title', 'EDIT MEAL')

@section('content')		
	<h1>
		Edit data for the meal: {{ $data['name'] }} in restaurant {{ $data['restaurant_id'] }}!
	</h1>
	
	@if(Session::has("message"))
		<p class="alert alert-info">{{ Session::get("message") }}</p>
	@endif
	<div>
	</div>
	<form action="{{ route('saveEditMeal', $data['id']) }}" method="POST" id="saveEditMeal">
		@csrf
		<div class="container"> 
            <p>Restaurant:</p>
			<!--<input type="text" id="restaurant_id" name="restaurant_id" value="{{ $data['restaurant_id'] }}">-->
            <select class="form-control m-bot15" name="restaurant_id">
                @if ($restaurants->count())
                    @foreach($restaurants as $restaurant)
                    <option @if($restaurant->id==$data->restaurant_id) selected @endif value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>    
                    @endforeach
                @endif

            </select>			
            <p>Meal name:</p>
			<input type="text" id="name" name="name" value="{{ $data['name'] }}">
			<p>Meal description:</p>
			<textarea cols="30" rows="10" id="description" name="description">{{ $data["description"] }}</textarea>
			</br>
			<p></p>
			<button type="submit" id="submit" class="btn btn-success">SUBMIT</button>
		</div>
	</form>

@endsection
