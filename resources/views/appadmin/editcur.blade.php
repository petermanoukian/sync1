@extends('layouts.appadmin')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class = 'floatleft'>
						<h1 class='text-dark fw-bolder fs-2 margintop7'>Edit Currency</h1>
					</div>
				</div>
                <div class="card-body">
					<div class="card-body">
						{!! Form::model($row, ['route' => ['CurUpdate.route'],
						'method' => 'PATCH',
						'class' => 'form',
						 'files' => true
						,'enctype'=>'multipart/form-data'
						]) !!}

					  <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"> Currency</label>

                            <div class="col-md-6">
                                <select id="name"  class="form-control" name="name"  required >

									@if(	
										($row->name  == 'US')
										)
									)
										<option value = 'US' selected> US Dollars </option>
									@else 
										<option value = 'US'> US Dollars </option>
									@endif
									
									@if(	
										($row->name  == 'LBP')
										)
									)
										<option value = 'LBP' selected> LBP </option>
									@else 
										<option value = 'LBP'> LBP </option>
									@endif

								 </select>
                            </div>
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