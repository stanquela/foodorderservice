@extends('layouts.app')

@section('title', 'RESTAURANT')

@section('content')		
	
	<div>
		@if(Session::has('message'))
			<p class="alert alert-info">{{ Session::get('message') }} </p>
		@endif
	</div>
	
        <h1>
			You picked restaurant: {{ $data['name'] }}!
		</h1>
		<div>
			
		</div>
		
		<div>Description: {{ $data['description'] }}</div>
		<div>Address: {{ $data['address'] }}</div>
        <div>Email: {{ $data['email'] }}</div>
        <div>Phone number: {{ $data['phone'] }}</div>

        <div>
			<a id="edit_restaurant" class="btn btn-info" href="{{ route('editRestaurant', $data->id) }}">EDIT</a>
			
			<form action=" {{ route('deleteRestaurant', $data->id) }} " method="POST">              
                @csrf  
				@method('DELETE')
				<div>
                    <input class="btn btn-danger" type="submit" value="Delete">
                </div>               
            </form>
		</div>
        <div>
            <h1>This restaurant can present you:</h1>
            @foreach($meals as $meal)
                <h2>MEAL: <a href={{ route('showMeal', $meal['id']) }}> {{ $meal['name'] }} </a></h2>
                <p>Description: {{ $meal['description'] }} </p>
            <div>
                <form action="{{ route('addToCart', $meal['id']) }}" method="POST" id="addToCart">
                    @csrf        
                    
                    <p>Quantity: <input type="number" min="1" max="100" name="quantity"></p>
                    <input class="btn btn-info" type="submit" value="Add to cart">
                </form>
            </div>
            @endforeach
        </div>
@endsection
