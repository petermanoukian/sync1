@extends('layouts.applog')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
				<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" 
						method="POST" action="{{ route('login') }}">
						
                        @csrf
						
						
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Sign In to Buzzer</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">New Here?
								<a href="/register" class="link-primary fw-bolder">
								Create an Account</a></div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Label-->
								<label class="form-label fs-6 fw-bolder text-dark">Email</label>
								<!--end::Label-->
								<!--begin::Input-->
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
								<div class="d-flex flex-stack mb-2">
									<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>

								@if (Route::has('password.request'))
                                    <a class="link-primary fs-6 fw-bolder" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
	
								</div>

								<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  form-control-lg form-control-solid-solid @error('password') is-invalid @enderror" 
								id="password" type="password"  name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								
								
								
								
							</div>
							
							
							
						    <div class="form-group row left">
								<div class="col-md-12 left">  
									<div class="form-check left"> 
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

										<label class="form-check-label" for="remember">
											<b>{{ __('Remember Me') }} </b>
										</label>
									</div>
								</div>
                             </div>

							<div class="text-center">
						
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
									<span class="indicator-label">Login</span>
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
