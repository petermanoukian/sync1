@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
				 <div class = 'floatleft'><h1 class='text-dark fw-bolder fs-2 margintop7'> Edit Categories </h1></div> 
				 <div class = 'floatleft'>	<a  href ='/appmerchant/viewcompany'
					class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Categories </a>
					<a  href ='/appmerchant/addcompany'
					class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'> Add Categories </a>
				</div>
				</div>
                <div class="card-body">
					<div class="card-body">
						{!! Form::model($row, ['route' => ['CatUpdate.route', $row->id],
						'method' => 'PATCH',
						'class' => 'form',
						 'files' => true
						,'enctype'=>'multipart/form-data'
						]) !!}

							<div class="form-group row">
								<label for="name">Title</label>
								<input type="text" name="name" class="form-control  form-control-lg form-control-solid" required  
								placeholder="Name"
								value = "{{$row->name}}">	
							</div>

							<div class="form-group row">
								<label for="name">Logo</label>
								<input type="file"  class="form-control  form-control-lg form-control-solid" id = 'img' name = 'img'  onchange="readURL(this);">
								<img id="blah" src="#" alt="your image"  style = 'max-width:300px;margin:5px;display:none;'/>
								@if($row->logo != '')
								<input type="text"  class="form-control  form-control-lg form-control-solid" id = 'pic' name = 'pic' value = "{{$row->logo}}" readonly>
								<div style = 'flat:left;clear:both;width:98%;'>
								<img src="<?php echo asset("images/cat/thumb/{$row->logo}")?>" style = 'margin-top:10px;clear:both'>
								</div>
								@endif
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