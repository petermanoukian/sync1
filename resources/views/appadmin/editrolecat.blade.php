@extends('layouts.appadmin')
   
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
				<div class="card-header"> 
					<div class = 'floatleft'>
					<h1 class='text-dark fw-bolder fs-2 margintop7'>Edit Roles</h1>
					</div> 
					<div class = 'floatleft'>
					<a  href ='/appadmin/viewrolecat'
					class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'> Roles  </a>
					
					</div>
				</div>
                
				<div class="card-body">
                  		{!! Form::model($row, ['route' => ['RolecatUpdate.route', $row->id],
						'method' => 'PATCH',
						'class' => 'form',
						]) !!}

						<div class="fv-row mb-10">
							<label class="form-label fs-6 fw-bolder text-dark">Role</label>
							<input class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  
							form-control-lg form-control-solid-solid " 
							type="text" name="name" 
							autocomplete="off" value = "{{$row->name}}"  required 
							autocomplete="name" autofocus/>
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