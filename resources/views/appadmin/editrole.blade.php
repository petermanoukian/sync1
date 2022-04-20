@extends('layouts.appadmin')
   
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
				<div class="card-header"> 
					<div class = 'floatleft'>
					<h1 class='text-dark fw-bolder fs-2 margintop7'>Edit Role Permission</h1>
					</div> 
					<div class = 'floatleft'>
					<a  href ='/appadmin/viewrole'
					class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'> Role Permissions  </a>
					
					</div>
				</div>
                
				<div class="card-body">
                  		{!! Form::model($row, ['route' => ['RoleUpdate.route', $row->id],
						'method' => 'PATCH',
						'class' => 'form',
						]) !!}

						<div class="fv-row mb-10">
							<label class="form-label fs-6 fw-bolder text-dark">Route Name</label>
							<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
							form-control-lg form-control-solid-solid " 
							type="text" name="name" 
							autocomplete="off" value = "{{$row->name}}"  required 
							autocomplete="name" autofocus/>
						</div>
						
						<div class="fv-row mb-10">
							<label class="form-label fs-6 fw-bolder text-dark">Menu Name</label>
							<input 
							class="form-control  form-control-lg form-control-solid form-control  
							form-control-lg form-control-solid-lg form-control  
							form-control-lg form-control-solid-solid " 
							type="text" name="menuname" 
							autocomplete="off" value = "{{$row->menuname}}" 
							autocomplete="menuname" autofocus/>
						</div>
						
						
						<div class="fv-row mb-10">
							<label class="form-label fs-6 fw-bolder text-dark">Path</label>
							<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
							form-control-lg form-control-solid-solid " 
							type="text" name="urlx"  value = "{{$row->urlx}}"
							autocomplete="off"  required />
						</div>
						
						<div class="fv-row mb-10">
							<label class="form-label fs-6 fw-bolder text-dark">Controller</label>
							<input class="form-control  form-control-lg form-control-solid form-control  
							form-control-lg form-control-solid-lg form-control  
							form-control-lg form-control-solid-solid " 
							type="text" name="sectionn" value = "{{$row->sectionn}}"
							autocomplete="off"  required />
						</div>
						
						
						<div class="fv-row mb-10">
							<label class="form-label fs-6 fw-bolder text-dark">Type</label>
							<select id="typ"  class="form-control" name="typ"  required >
								@if(	
									($row->typ  == 'perpath')
									)
								)
								<option value = 'perpath' selected> Per Path </option>
								@else 
								<option value = 'perpath'> Per Path </option>
								@endif
								
								@if(	
									($row->typ  == 'percontroller')
									)
								)
									<option value = 'percontroller' selected> Per Cotroller </option>
								@else 
									<option value = 'percontroller' > Per Cotroller </option>
								@endif
								
								@if(	
									($row->typ  == 'open')
									)
								)
									<option value = 'open' selected> Open</option>
								@else 
									<option value = 'open' > Open </option>
								@endif
							</select>
						</div>
						
		
						<div class="fv-row mb-10">
							<label class="form-label fs-6 fw-bolder text-dark">Appear on Menu</label>
							<select id="menux"  class="form-control" name="menux"  required >
								@if(	
									($row->menux  == 'perpath')
									)
								)
								<option value = 'yes' selected> Yes </option>
								@else 
								<option value = 'yes'> Yes </option>
								@endif
								
								@if(	
									($row->menux  == 'no')
									)
								)
									<option value = 'no' selected> No </option>
								@else 
									<option value = 'no' > No </option>
								@endif
								
	
							</select>
						</div>
						
						<div class="fv-row mb-10">
							<label class="form-label fs-6 fw-bolder text-dark">Class Method </label>
							<input class="form-control  form-control-lg form-control-solid form-control  
							form-control-lg form-control-solid-lg form-control  
							form-control-lg form-control-solid-solid " 
							type="text" name="classer" value = "{{$row->classer}}"
							autocomplete="off"  required />
						</div>


						<div class="fv-row mb-10">
							<label class="form-label fs-6 fw-bolder text-dark">Method 1</label>
							<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
							form-control-lg form-control-solid-solid " 
							type="text" name="method1" value = "{{$row->method1}}"
							autocomplete="off"  required />
						</div>
						
						<div class="fv-row mb-10">
							<label class="form-label fs-6 fw-bolder text-dark">Method 2</label>
							<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
							form-control-lg form-control-solid-solid " 
							type="text" name="method2" value = "{{$row->method2}}"
							autocomplete="off"  />
						</div>
						
						<div class="fv-row mb-10">
							<label class="form-label fs-6 fw-bolder text-dark">Method 3</label>
							<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
							form-control-lg form-control-solid-solid " 
							type="text" name="method3" value = "{{$row->method3}}"
							autocomplete="off"  />
						</div>
						

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
				
				
				
				
            </div>
        </div>
    </div>
</div>




@endsection