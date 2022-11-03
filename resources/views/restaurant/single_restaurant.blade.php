@extends('layout')

@section('title', 'RESTAURANT')

@section('content')		
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

@endsection
