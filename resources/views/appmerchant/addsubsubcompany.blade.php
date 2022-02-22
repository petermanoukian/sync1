@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

				<div class="card-header">
					<div class = 'floatleft'>
					<h1 class='text-dark fw-bolder fs-2 margintop7'> Sub Companies </h1>
					</div> 
					<div class = 'floatleft'>
						<a  href ='/appmerchant/addcompany'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Add Company  </a>	
						<a  href ='/appmerchant/viewcompany'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Companies </a> 
						<a  href ='/appmerchant/viewsubcompany/<?php echo $compid ; ?>'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>View Sub Companies </a> 
						 <a  href ='/appmerchant/addsubcompany/<?php echo $compid ; ?>'
						 class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>
						 Add Sub Companies </a> 
						<a  href ='/appmerchant/viewsubsubcompany/<?php echo $compid ; ?>/<?php echo $subcompid ; ?>'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>
						Sub Sub Companies</a> 
					</div>
				</div>
				
				
				
				
                <div class="card-body">
					<div class="card-body">
						{{Form::open(array('url' => 'appmerchant/subsubcompany/add', 'method' => 'post', 'files' => true
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
							
							<div class="form-group">
								<label for="subcomany">Sub Company</label>
								<div id = 'subcompid2'>Choose a Company First</div>
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


@section('scripts')


@if(request()->route('compid')  && request()->route('compid') != 0 && request()->route('compid')  != '')

@if(request()->route('subcompid')  && request()->route('subcompid') != 0 && request()->route('subcompid')  != '')

<script type="text/javascript">



	$( document ).ready(function() {

		$.ajax({
			url: "{{ route('getsubcomsbycomp') }}?compid=" + {{ request()->route('compid') }} + "&subcompid=" + {{ request()->route('subcompid') }},	
			method: 'GET',
			success: function(data) {
				$('#subcompid2').html(data.html);
			}
		});
	});	 

	$("#compid").change(function(){	
		 $('#subcompid2').html('....Loading Sub companies....');
		$.ajax({
			url: "{{ route('getsubcomsbycomp') }}?compid=" + $(this).val(),	
			method: 'GET',
			success: function(data) {
				$('#subcompid2').html(data.html);
			}
		});
	});
</script>
@else 
<script type="text/javascript">



	$( document ).ready(function() {

		$.ajax({
			url: "{{ route('getsubcomsbycomp') }}?compid=" + {{ request()->route('compid') }},	
			method: 'GET',
			success: function(data) {
				$('#subcompid2').html(data.html);
			}
		});
	});	 

	$("#compid").change(function(){	
		 $('#subcompid2').html('....Loading Sub companies....');
		$.ajax({
			url: "{{ route('getsubcomsbycomp') }}?compid=" + $(this).val(),	
			method: 'GET',
			success: function(data) {
				$('#subcompid2').html(data.html);
			}
		});
	});
</script>
@endif


@else 
	
<script type="text/javascript">



	$( document ).ready(function() {

		$.ajax({
			url: "{{ route('getsubcomsbycomp') }}",		
			method: 'GET',
			success: function(data) {
				$('#subcompid2').html(data.html);
			}
		});
	});	 

	$("#compid").change(function(){	
	
		 $('#subcompid2').html('....Loading Sub companies....');
		$.ajax({
			url: "{{ route('getsubcomsbycomp') }}?compid=" + $(this).val(),	
			method: 'GET',
			success: function(data) {
				$('#subcompid2').html(data.html);
			}
		});
	});
</script>


@endif



@endsection
