@extends('layouts.appadmin')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
			
				<div class="card-header"> 
					<div class = 'floatleft'>
					<h1 class='text-dark fw-bolder fs-2 margintop7'>Add Role Permissions</h1>
					</div> 
					<div class = 'floatleft'>
					<a  href ='/appadmin/viewrole'
					class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'> Role Permissions </a>
					
					</div>
				</div>
			
			
			
				<div class="card-body">
					
						 <form method="POST" action="{{ route('RoleAdd.route') }}">
						
                        @csrf
						

							

	
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Route Name</label>
								<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
								form-control-lg form-control-solid-solid " 
								type="text" name="name" 
								autocomplete="off" value="{{ old('name') }}" required 
								autocomplete="name" autofocus/>
							</div>
							
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Path</label>
								<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
								form-control-lg form-control-solid-solid " 
								type="text" name="urlx" 
								autocomplete="off"  required />
							</div>
							
							
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Controller</label>
								<input class="form-control  form-control-lg form-control-solid form-control  
								form-control-lg form-control-solid-lg form-control  
								form-control-lg form-control-solid-solid " 
								type="text" name="sectionn" 
								autocomplete="off"   />
							</div>
							
							
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Type</label>
									<select id="typ"  class="form-control" name="typ"  required >
										<option value = 'perpath'> Per Path </option>
										<option value = 'percontroller' > Per Cotroller </option>
										<option value = 'open' > Open  </option>
									</select>
							</div>
							

							
							<div class="form-group row">
								Details
							</div>
							<div class="form-group row">
								<textarea class="form-control  form-control-lg form-control-solid"  name="des"></textarea>	
							</div>
							
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Class Method </label>
								<input class="form-control  form-control-lg form-control-solid form-control  
								form-control-lg form-control-solid-lg form-control  
								form-control-lg form-control-solid-solid " 
								type="text" name="classer" 
								autocomplete="off"  required />
							</div>
							
							
							
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Method 1</label>
								<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
								form-control-lg form-control-solid-solid " 
								type="text" name="method1" 
								autocomplete="off"   />
							</div>
							
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Method 2</label>
								<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
								form-control-lg form-control-solid-solid " 
								type="text" name="method2" 
								autocomplete="off"  />
							</div>
							
							
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Method 3</label>
								<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
								form-control-lg form-control-solid-solid " 
								type="text" name="method3" 
								autocomplete="off"  />
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