@extends('layouts.appadmin')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
				
				<div class = 'floatleft'>
				<h1 class='text-dark fw-bolder fs-2 margintop7'>Edit User Permissions</h1>
				</div> 
				<div class = 'floatleft'>

				<a  href ='/appadmin/viewroleuser/{{ $row->userid }}' class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Branches </a>

				
				</div>

				</div>
                <div class="card-body">
					<div class="card-body">
						{!! Form::model($row, ['route' => ['RoleuserUpdate.route', $row->id],
						'method' => 'PATCH',
						'class' => 'form',
						 'files' => true
						,'enctype'=>'multipart/form-data'
						]) !!}
						
						
							<div class="form-group row">
								<label for="name">User</label>
								<select name="userid" id='userid' 
								class="form-control  form-control-lg form-control-solid"   required>
									
								@foreach($users as $us)	
									@if($row->userid == $us->id)
										<option value = {{ $us->id }} selected> 
										{{$us->name}} {{$us->lname}} {{$us->email}}</option>
									@endif
								@endforeach 
								</select>	
							</div>
						
						
							<div class="form-group row">
								<label for="name">Role</label>
								<select name="rolerid" id='rolerid' 
								class="form-control  form-control-lg form-control-solid"   required>
									
								@foreach($roles as $rl)	
									@if($row->rolerid == $rl->id)
										<option value = {{ $rl->id }} selected> {{$rl->name}} </option>
									@else 
										<option value = {{ $rl->id }} > {{$rl->name}} </option>
									@endif
								@endforeach 
								</select>	
							</div>


						    <div class="form-group row">
								<input type="submit" value="Update" class="btn btn-primary paddtop6 bold">
						    </div>
						{!! Form::close() !!}
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')


@endsection


