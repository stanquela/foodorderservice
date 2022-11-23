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
                User {{$user_id}}:
            </ul>
            @foreach($meals as $meal)
                <p>meal id {{$meal->meal_id}}</p>
                <p>quantity( {{$meal->quantity}} )</p>
            @endforeach

		</div>
      
		
		
@endsection
