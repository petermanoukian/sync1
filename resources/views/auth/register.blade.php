@extends('layouts.applog')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               

                <div class="card-body">
					
					
						<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" 
						method="POST" action="{{ route('register') }}">
						
                        @csrf
						
							<div class="text-center mb-10">
								<h1 class="text-dark mb-3">Sign up to Buzzer</h1>
								<div class="text-gray-400 fw-bold fs-4">Already Have an account?
								<a href="/login" class="link-primary fw-bolder">Login </a></div>
							</div>
	
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Full Name</label>
								<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  form-control-lg form-control-solid-solid @error('email') is-invalid @enderror" 
								type="text" name="name" 
								autocomplete="off" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
					
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Email</label>
								<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  form-control-lg form-control-solid-solid @error('email') is-invalid @enderror" 
								type="email" name="email" 
								autocomplete="off" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							
							
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Level</label>
								 <select id="levell"  class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  form-control-lg form-control-solid-solid"
								 name="levell"  required >
								 	<option value = '2'> Company</option>

								 </select>
							</div>
							
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">{{ __('Password') }}</label>
								<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  form-control-lg form-control-solid-solid @error('password') is-invalid @enderror" 
								id="password" type="password" name="password"
								autocomplete="off" value="{{ old('password') }}" required autocomplete="password" autofocus/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	
							</div>

							
							<div class="fv-row mb-10">
								<div class="d-flex flex-stack mb-2">
									<label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('Confirm Password') }}</label>
								</div>
								<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  form-control-lg form-control-solid-solid " 
								id="password-confirm" type="password"  name="password_confirmation" 
								required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							
		
							<div class="text-center">
						
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
									<span class="indicator-label">Register</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
						
							</div>
							
						</form>
					</div>
					
					
					
					
					
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
