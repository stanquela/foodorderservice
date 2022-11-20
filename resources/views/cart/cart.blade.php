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

            </ul>
		</div>
      
		
		
@endsection
