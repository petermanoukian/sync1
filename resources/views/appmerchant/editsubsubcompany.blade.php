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
				| <a  href ='/appmerchant/viewsubsubcompany/'> &rsaquo; Sub Sub Companies </a>
				| <a  href ='/appmerchant/addsubsubcompany/'> &rsaquo; Add Sub Sub Companies </a>
				</div>
                <div class="card-body">
					<div class="card-body">
						{!! Form::model($row, ['route' => ['subsubCompanyUpdate.route', $row->id],
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
							
						    <div class="form-group">
								<label for="city">SubCategory</label>
								<div id = 'subcompid2'>Choose a Category First</div>
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
								<img src="<?php echo asset("images/subsubcompany/thumb/{$row->logo}")?>" style='margin-top:10px;clear:both'>
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


@section('scripts')

<script type="text/javascript">

	$( document ).ready(function() {

		$.ajax({
			url: "{{ route('getsubcomsbycomp') }}?compid=" + {{ request()->route('compid') }} + "&subcompid=" + {{ request()->route('subcompid') }},	
			method: 'GET',
			success: function(data) {

				//alert(data.html);
				//data1 += data.html;
				$('#subcompid2').html(data.html);
			}
		});
	
	});	 




	$("#compid").change(function(){	
		 $('#subcompid2').html('....Loading Subcompanies....');
		$.ajax({
			url: "{{ route('getsubcomsbycomp') }}?compid=" + $(this).val(),	
			method: 'GET',
			success: function(data) {
				$('#subcompid2').html(data.html);
			}
		});
	});
</script>

@endsection


