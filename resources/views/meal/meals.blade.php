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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha256-3sPp8BkKUE7QyPSl6VfBByBroQbKxKG7tsusY2mhbVY=" crossorigin="anonymous" />

<div class="container">
            <div class="row">
                 <div class="col-lg-10 mx-auto mb-4">
                    <div class="section-title text-center ">
                        <h3 class="top-c-sep">Choose your perfect meal in our restaurants!</h3>
                        <p>Lorem ipsum dolor sit detudzdae amet, rcquisc adipiscing elit. Aenean socada commodo
                            ligaui egets dolor. Nullam quis ante tiam sit ame orci eget erovtiu faucid.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="career-search mb-60">

                         <div class="filter-result">
                            <p class="mb-30 ff-montserrat">Total meals to choose from:</p>
                            @foreach($meal['data'] as $single)
                            <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                                <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                    <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                        
                                    </div>
                                    <div class="job-content">
                                        <h5 class="text-center text-md-left">{{ $single['name'] }}</h5>
                                        <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                            <li class="mr-md-4">
                                                <i class="zmdi zmdi-pin mr-2">{{ $single->restaurants->name }} (ID of restaurant: {{ $single['restaurant_id'] }})</i> 
                                            </li>

                                            <li class="mr-md-4">
                                                <i class="zmdi zmdi-time mr-2">Price: {{ $single['price'] }}</i> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="job-right my-4 flex-shrink-0">
                                    <a class="btn d-block w-100 d-sm-inline-block btn-light" href=" {{ route('showMeal', $single['id']) }} ">Read more...</a>
                                </div>
                                <div>
                                    <form action="{{ route('addToCart', $single['id']) }}" method="POST" id="addToCart">
                                        @csrf        
                                        
                                        <p>Quantity: <input type="number" min="1" max="100" name="quantity"></p>
                                        <input class="btn btn-info" type="submit" value="Add to cart">
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- START Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-reset justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="zmdi zmdi-long-arrow-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item d-none d-md-inline-block"><a class="page-link" href="#">2</a></li>
                            <li class="page-item d-none d-md-inline-block"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">8</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="zmdi zmdi-long-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- END Pagination -->
                </div>
            </div>

        </div>
		
		
@endsection
