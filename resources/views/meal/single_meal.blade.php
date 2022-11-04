@extends('layout')

@section('title', 'Meal')

@section('content')		
		<h1>
			You picked meal: {{ $data['name'] }}, from restaurant: {{ $data['restaurant_id'] }}!
		</h1>
		<div>
			
		</div>
		
		<div>Description: {{ $data['description'] }}</div>
		

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
