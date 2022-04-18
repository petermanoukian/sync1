@extends('layouts.appadmin')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
			
				<div class="card-header"> 
					<div class = 'floatleft'>
					<h1 class='text-dark fw-bolder fs-2 margintop7'>Add Roles</h1>
					</div> 
					<div class = 'floatleft'>
					<a  href ='/appadmin/viewrolecat'
					class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'> Roles  </a>
					
					</div>
				</div>

				<div class="card-body">		
					 <form method="POST" action="{{ route('RolecatAdd.route') }}">
						@csrf
						<div class="fv-row mb-10">
							<label class="form-label fs-6 fw-bolder text-dark">Route Name</label>
							<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
							form-control-lg form-control-solid-solid " 
							type="text" name="name" 
							autocomplete="off" value="{{ old('name') }}" required 
							autocomplete="name" autofocus/>
						</div>

						<div class="text-center">
							<button type="submit" id="kt_sign_in_submit" class="btn btn-primary paddtop6 bold">
								<span class="indicator-label">Add Role</span>
							</button>
						</div>
						
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection