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
                <p>testing cart item id: {{ $cart_item->id }}</p>
                <form action=" {{ route('deleteFromCart', $cart_item->id) }} " method="POST">              
                    @csrf  
				    @method('DELETE')
				    <div>
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </div>               
                </form>
            @endforeach

		</div>
        <div>
           TOTAL PRICE: {{ $total_price }}
        </div>

        <div>
                <form action=" {{ route('addOrder') }} " method="POST">              
                    @csrf  
				    <div>
                        <div>    
                            <p>Add details for your order:</p>
                            <textarea name="details" cols="30" rows="10" class="form-control"></textarea>
                        </div><br>   
                     
                        <button type="submit" id="submit" class="btn btn-success">ADD ORDER</button>
                    </div>               
                </form>
        </div>
		
@endsection
