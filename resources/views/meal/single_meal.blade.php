@extends('layouts.app')

@section('title', 'Meal')

@section('content')		
        <div>
		@if(Session::has('message'))
			<p class="alert alert-info">{{ Session::get('message') }}</p>
		@endif
	</div>		
        <h1>
			You picked meal: {{ $data['name'] }}, from restaurant: <a href="{{ route('showRestaurant', $data->restaurants->id) }}">{{ $restaurant}}</a>!
		</h1>
		<div>
			
		</div>
		
		<div>Description: {{ $data['description'] }}</div>
		
        <div>
            <form action="{{ route('addToCart', $data->id) }}" method="POST" id="addToCart">
                @csrf        
                <input type="number" min="1" max="100" name="quantity">
                <input class="btn btn-info" type="submit" value="Add to cart">
            </form>
        </div>

        <div>
			<a id="edit_meal" class="btn btn-info" href="{{ route('editMeal', $data->id) }}">EDIT</a>
			
			<form action=" {{ route('deleteMeal', $data->id) }} " method="POST">              
                @csrf  
				@method('DELETE')
				<div>
                    <input class="btn btn-danger" type="submit" value="Delete">
                </div>               
            </form>
		</div>

@endsection
