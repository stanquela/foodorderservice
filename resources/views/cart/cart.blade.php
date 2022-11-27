@extends('layouts.app')

@section('title', 'CART')

@section('content')		
	
	<div>
		@if(Session::has('message'))
			<p class="alert alert-info">{{ Session::get('message') }} </p>
		@endif
	</div>

		<h1>
			This is your cart!
		</h1>
		<div>
			<ul>
                User {{$user_id}}: {{ $user_name }}
            </ul>
            @foreach($user_cart as $cart_item)
                <p>meal id {{ $cart_item->meal_id }} (Meal name: {{ $cart_item->meals->name }} (price: {{ $cart_item->meals->price }}), from restaurant {{ $cart_item->meals->restaurants->name }} )</p>
                <p>quantity( x{{ $cart_item->quantity }} )</p>
                <p>Cost of meals: {{$cart_item->quantity*$cart_item->meals->price}}</p>
                
            @endforeach

		</div>
        <div>
           TOTAL PRICE: {{ $total_price }}
        </div>
		
		
@endsection
