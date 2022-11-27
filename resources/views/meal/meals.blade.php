@extends('layouts.app')

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
            <div>{{ $single->restaurants->name }} (ID of restaurant: {{ $single['restaurant_id'] }})</div>			
            <div>{{ $single['name'] }}</div>
			<div>{{ $single['description'] }}</div>
			<div>{{ $single['price'] }}</div>
			<a href=" {{ route('showMeal', $single['id']) }} ">Read more...</a>
            <div>
                <form action="{{ route('addToCart', $single['id']) }}" method="POST" id="addToCart">
                    @csrf        
                    
                    <p>Quantity: <input type="number" min="1" max="100" name="quantity"></p>
                    <input class="btn btn-info" type="submit" value="Add to cart">
                </form>
            </div>
		@endforeach
		
		
@endsection
