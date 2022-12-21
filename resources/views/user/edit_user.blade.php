@extends('layouts.app')

@section('title', 'EDIT USER')

@section('content')		
	<h1>
		Edit an existing user in DB!
	</h1>
	
	@if(Session::has("message"))
		<p class="alert alert-info">{{ Session::get("message") }}</p>
	@endif
	

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit existing user') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('saveEditUser', $data['id']) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data['name'] }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data['email'] }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                <!--CUSTOM DATA-->
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" autofocus value="{{ $data['phone'] }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" autofocus value="{{ $data['address'] }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="restaurant_id" class="col-md-4 col-form-label text-md-end">{{ __('restaurant_id') }}</label>

                            <div class="col-md-6">
                                <input id="restaurant_id" type="text" class="form-control" name="restaurant_id" autofocus value="{{ $data['restaurant_id'] }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('role') }}</label>

                            <div class="col-md-6">
                                <input id="role" type="text" class="form-control" name="role" autofocus value="{{ $data['role'] }}">
                            </div>
                        </div>
                <!--END CUSTOM DATA-->
                        
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit existing user') }}
                                </button>
                            </div>
                        </div>
                    </form>

			<form action=" {{ route('deleteUser', $data->id) }} " method="POST">              
                @csrf  
				@method('DELETE')
				<div>
                    <input class="btn btn-danger" type="submit" value="Delete">
                </div>               
            </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
