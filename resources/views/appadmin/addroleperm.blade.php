@extends('layouts.appadmin')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
			
				<div class="card-header"> 
					<div class = 'floatleft'>
					<h1 class='text-dark fw-bolder fs-2 margintop7'>Add Permissions to Roles</h1>
					</div> 
					<div class = 'floatleft'>
					<a  href ='/appadmin/viewroleperm/{{ $rolercatid }}'
					class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'> USer Roles  </a>
					
					</div>
				</div>
			
			
			
				<div class="card-body">
					
						 <form method="POST" action="{{ route('RolepermAdd.route') }}">
						
                        @csrf
						
							<div class="form-group row">
								<label for="name">Roles </label>
								<select name="rolercatid" id='rolercatid' 
								class="form-control  form-control-lg form-control-solid"  
								placeholder="User" required>
									@foreach($rolecats as $cat)
										@if($rolercatid  && $rolercatid != 0 && $rolercatid  == $cat->id)
										<option value={{ $cat->id }} selected>
										{{$cat->name}} </option>
										@endif
									@endforeach 
								</select>	
							</div>

							<div class="form-group row">
								<label for="name">Roles</label>
								<select name="rolerid[]" id='rolerid' 
								class="form-control  form-control-lg form-control-solid"  
								multiple required size = 10>	
									@foreach($roles as $role)
										<option value = {{ $role->id }} > 
										{{$role->sectionn}} : <b>{{$role->name}} </b>( {{$role->urlx}} )</option>
									@endforeach 
								</select>	
							</div>

							<div class="text-center">
								<button type="submit" id="kt_sign_in_submit" class="btn btn-primary paddtop6 bold">
									<span class="indicator-label">Add Role to user</span>
								</button>
							</div>
							
						</form>
					
					</div>
			
			
			
			
                
              
            </div>
        </div>
    </div>
</div>
@endsection