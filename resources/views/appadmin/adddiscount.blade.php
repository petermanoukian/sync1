@extends('layouts.appadmin')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
				<div class = 'floatleft'>
				<h1 class='text-dark fw-bolder fs-2 margintop7'>Add Discount </h1>
				</div>
				<div class = 'floatleft'><a  href ='/appadmin/viewdiscount'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Discounts </a>
				</div>
				
				</div>
                <div class="card-body">
					<div class="card-body">
						{{Form::open(array('url' => 'appadmin/discount/add', 'method' => 'post', 'files' => true
						,'enctype'=>'multipart/form-data'))}}

							<div class="form-group row">
								<label for="name">Title</label>
								<input type="text" name="name" class="form-control  form-control-lg form-control-solid" required  placeholder="Name">	
							</div>
							
							<div class="form-group row">
								<label for="name">Percentage</label>
								<input type="text" name="perc" class="form-control  form-control-lg form-control-solid" required  
								placeholder="Percentage">	
							</div>
						
						    <div class="form-group row">
								<input type="submit" value="Add" class="btn btn-primary paddtop6 bold">
						    </div>
						{!! Form::close() !!}
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection