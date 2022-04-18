@extends('layouts.appadmin')
   
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Admin</div>
                
				<div class="card-body">
                  		{!! Form::model($row, ['route' => ['AdminUserUpdate.route', $row->id],
						'method' => 'PATCH',
						'class' => 'form',
						]) !!}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
								value = "{{$row->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
								value = "{{$row->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						
					  <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> Type</label>

                            <div class="col-md-6">
                                <select id="is_admin"  class="form-control" name="is_admin"  required >

									@if(	
										($row->is_admin  == 1)
										)
									)
										<option value = 1 selected> Super Admin </option>
									@else 
										<option value = 1> Super Admin </option>
									@endif
									
									@if(	
										($row->is_admin  == 2)
										)
									)
										<option value = 2 selected> Merchant </option>
									@else 
										<option value = 2> Merchant </option>
									@endif
									
			




								 </select>
                            </div>
                        </div>	
						
						
					  <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> Confirmed By Email</label>
                            <div class="col-md-6">
                                <select id="conf"  class="form-control" name="conf"  required >
								 	<option value = '1'
									 @if ($row->conf1 == 1)
									 {{'selected="selected"'}}
									 @endif 
									 >
									 Yes</option>
								 	<option value = '0'
									 @if ($row->conf1 == 0)
									 {{'selected="selected"'}}
									 @endif 
									
									> No</option>
								 </select>
                            </div>
                       </div>	
						
					<div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> Confirmed By Admin</label>
                            <div class="col-md-6">
                                <select id="conf2"  class="form-control" name="conf2"  required >
								 	<option value = '1'
									@if ($row->conf2 == 1)
									 {{'selected="selected"'}}
									 @endif 
									
									> Yes</option>
								 	<option value = '0'
									@if ($row->conf2 == 0)
									 {{'selected="selected"'}}
									 @endif 
									> No</option>
								 </select>
                            </div>
                       </div>	
	
						
						
						

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') 
								is-invalid @enderror" name="password" autocomplete="new-password">
                            </div>
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