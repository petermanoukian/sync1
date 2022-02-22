@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
				
					<div class = 'floatleft'><h1 class='text-dark fw-bolder fs-2 margintop7'> Add Sub Company </h1></div> 
					 <div class = 'floatleft'>	<a  href ='/appmerchant/viewcompany'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Companies </a>
						<a  href ='/appmerchant/addcompany'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'> Add Companies </a>	
						<a  href ="/appmerchant/viewsubcompany/<?php echo $compid ; ?>/"
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'> View Sub Companies </a> 
					</div>
				
				
				
				
				</div>
                <div class="card-body">
					<div class="card-body">
						{{Form::open(array('url' => 'appmerchant/subcompany/add', 'method' => 'post', 'files' => true
						,'enctype'=>'multipart/form-data'))}}
						
							<div class="form-group row">
								<label for="name">Company</label>
								<select name="compid" id='compid' class="form-control  form-control-lg form-control-solid"  placeholder="Company" required>
									<option value = ''>Choose Company </option>
									@foreach($comps as $comp)
										@if($compid  && $compid != 0 && $compid  == $comp->id)
											<option value = {{ $comp->id }} selected> {{$comp->name}} </option>
										@else 
											<option value = {{ $comp->id }} > {{$comp->name}} </option>
										@endif
									@endforeach 
								</select>	
							</div>
						
							<div class="form-group row">
								<label for="name">Type</label>
								<select name="typesubcompid" id='typesubcompid' class="form-control  form-control-lg form-control-solid"  placeholder="Type" required>
									<option value = ''>Choose Type </option>
									@foreach($typs as $typ)

										<option value = {{ $typ->id }} > {{$typ->name}} </option>
										
									@endforeach 
								</select>	
							</div>

							<div class="form-group row">
								<label for="name">Title</label>
								<input type="text" name="name" class="form-control  form-control-lg form-control-solid" required  placeholder="Name">	
							</div>
							<div class="form-group row">
								<label for="name">Logo</label>
								<input type="file"  class="form-control  form-control-lg form-control-solid" id = 'img' name = 'img' onchange="readURL(this);">
								
								<img id="blah" src="#" alt="your image"  style = 'max-width:300px;margin:5px;display:none;'/>
							</div>
						    <div class="form-group row">
								<input type="submit" value="Add"  class="btn btn-primary paddtop6 bold">
						    </div>
						{!! Form::close() !!}
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection