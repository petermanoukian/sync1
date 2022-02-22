@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <h1 class='text-dark fw-bolder fs-2 margintop7'> Add Company </h1>  
				<a  href ='/appmerchant/viewcompany'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>&rsaquo; Companies </a></div>
                <div class="card-body">
					<div class="card-body">
						{{Form::open(array('url' => 'appmerchant/company/add', 'method' => 'post', 'files' => true
						,'enctype'=>'multipart/form-data'))}}

							<div class="form-group row">
								<label for="name">Title</label>
								<input type="text" name="name" 
								class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  form-control-lg form-control-solid-solid" required  placeholder="Name">	
							</div>
							<div class="form-group row">
								<label for="name">Logo</label>
								<input type="file"  class="form-control  form-control-lg form-control-solid form-control  form-control-lg form-control-solid-lg form-control  form-control-lg form-control-solid-solid" 
								id = 'img' name = 'img' onchange="readURL(this);">
								
								<img id="blah" src="#" alt="your image"  style = 'max-width:300px;margin:5px;display:none;'/>
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