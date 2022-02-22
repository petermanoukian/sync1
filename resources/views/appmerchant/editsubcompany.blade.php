@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Sub Company 
				| <a  href ='/appmerchant/viewcompany'>&rsaquo; Companies </a>
				| <a  href ='/appmerchant/addcompany'>&rsaquo; Add Companies </a>
				| <a  href ='/appmerchant/viewsubcompany'>&rsaquo; Sub Companies </a>
				| <a  href ='/appmerchant/addsubcompany'>&rsaquo; Add Sub Companies </a>
				
				
				</div>
                <div class="card-body">
					<div class="card-body">
						{!! Form::model($row, ['route' => ['subCompanyUpdate.route', $row->id],
						'method' => 'PATCH',
						'class' => 'form',
						 'files' => true
						,'enctype'=>'multipart/form-data'
						]) !!}
						
						
							<div class="form-group row">
								<label for="name">Company</label>
								<select name="compid" id='compid' class="form-control  form-control-lg form-control-solid"   required>
									
								@foreach($comps as $comp)	
									@if($row->compid == $comp->id)
										<option value = {{ $comp->id }} selected> {{$comp->name}} </option>
									@else 
										<option value = {{ $comp->id }} > {{$comp->name}} </option>
									@endif
								@endforeach 
								</select>	
							</div>
							
							<div class="form-group row">
								<label for="name">Type</label>
								<select name="typesubcompid" id='typesubcompid' class="form-control  form-control-lg form-control-solid"   required>
									
								@foreach($typs as $typ)	
									@if($row->typesubcompid == $typ->id)
										<option value = {{ $typ->id }} selected> {{$typ->name}} </option>
									@else 
										<option value = {{ $typ->id }} > {{$typ->name}} </option>
									@endif
								@endforeach 
								</select>	
							</div>
						

							<div class="form-group row">
								<label for="name">Title</label>
								<input type="text" name="name" class="form-control  form-control-lg form-control-solid" required  placeholder="Name"
								value = "{{$row->name}}">	
							</div>

							<div class="form-group row">
								<label for="name">Logo</label>
								<input type="file"  class="form-control  form-control-lg form-control-solid" id = 'img' name = 'img' 
								 onchange="readURL(this);">
								
								<img id="blah" src="#" alt="your image"  style = 'max-width:300px;margin:5px;display:none;'/>
								
								@if($row->logo != '')
								<input type="text"  class="form-control  form-control-lg form-control-solid" id = 'pic' name = 'pic' value = "{{$row->logo}}" readonly>
								<div style = 'flat:left;clear:both;width:98%;'>
								<img src="<?php echo asset("images/subcompany/thumb/{$row->logo}")?>" style = 'margin-top:10px;clear:both'>
								</div>
								@endif

							</div>




						    <div class="form-group row">
								<input type="submit" value="Update" class="button4">
						    </div>
						{!! Form::close() !!}
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection