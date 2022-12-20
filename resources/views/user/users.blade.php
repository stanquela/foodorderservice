@extends('layouts.app')

@section('title', 'USERS')

@section('content')		
	
	<div>
		@if(Session::has('message'))
			<p class="alert alert-info">{{ Session::get('message') }} </p>
		@endif
	</div>

		<h1>
			USERS!
		</h1>
		<div>
			
		</div>
        <div class="container mt-5">
            <div class="row">
		        @foreach($user['data'] as $single)
                    
                        <div class="col-md-4">
                            <div class="card p-3">
                                <div class="d-flex flex-row mb-3"><img src="https://i.imgur.com/ccMhxvC.png" width="70">
                                    <div class="d-flex flex-column ml-2"><span>{{ $single['name'] }}</span><span class="text-black-50">{{ $single['address']}}</span><span class="ratings"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></div>
                                </div>
                                <h6>{{ $single['phone'] }}</h6>
                                <div class="d-flex justify-content-between install mt-3"><span>foo-d-order-service</span><span class="text-primary"><a href=" {{ route('showRestaurant', $single['id']) }} ">Read more...</a><i class="fa fa-angle-right"></i></span></div>
                            </div>
                        </div>
                    
		        @endforeach
            </div>
	    </div>


		
@endsection
