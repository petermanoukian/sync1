@extends('layouts.appadmin')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
			
			
			
				<div class="card-body">
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						 <form method="POST" action="{{ route('UserAdd.route') }}">
						
                        @csrf
						
							<div class="text-center mb-10">
								<h1 class="text-dark mb-3">Add User</h1>
				
							</div>
	
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">First Name</label>
								<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
								form-control-lg form-control-solid-solid " 
								type="text" name="name" 
								autocomplete="off" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							
							
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Last Name</label>
								<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
								form-control-lg form-control-solid-solid " 
								type="text" name="lname" 
								autocomplete="off" value="{{ old('lname') }}" required autocomplete="name" autofocus/>

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
								 <select id="levell"  class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
								 form-control-lg form-control-solid-solid"
								 name="levell"  required >
									<option value = '1'> Super Admin</option>
								 	<option value = '2'> Company</option>
								 </select>
							</div>
							
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Status</label>
								 <select id="statuss"  class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg 
								 form-control  form-control-lg form-control-solid-solid"
								 name="statuss"  required >
									<option value = '2'> New</option>
								 	<option value = '1'> Active</option>
									<option value = '0'> Inactive</option>
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

							<div class="text-center">
						
								<button type="submit" id="kt_sign_in_submit" class="btn btn-primary paddtop6 bold">
									<span class="indicator-label">Add User</span>
								
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