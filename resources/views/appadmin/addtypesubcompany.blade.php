@extends('layouts.appadmin')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add SubCompany Type | <a  href ='/appadmin/viewsubcompanytype'>&rsaquo; SubCompany Types </a></div>
                <div class="card-body">
					<div class="card-body">
						{{Form::open(array('url' => 'appadmin/subcompanytype/add', 'method' => 'post', 'files' => true
						,'enctype'=>'multipart/form-data'))}}

							<div class="form-group row">
								<label for="name">Title</label>
								<input type="text" name="name" class="form-control  form-control-lg form-control-solid" required  placeholder="Name">	
							</div>
						
						    <div class="form-group row">
								<input type="submit" value="Add" class="button4">
						    </div>
						{!! Form::close() !!}
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection