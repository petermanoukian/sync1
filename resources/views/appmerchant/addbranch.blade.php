@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Add Branch
				| <a  href ='/appmerchant/viewbranch'>&rsaquo; Branches </a>
				| <a  href ='/appmerchant/viewcompany'>&rsaquo; Companies </a>
				| <a  href ='/appmerchant/addcompany'>&rsaquo; Add Companies </a>
				| <a  href ='/appmerchant/viewsubcompany/<?php echo $compid ; ?>'>&rsaquo; Sub Companies </a>
				| <a  href ='/appmerchant/addsubcompany/<?php echo $compid ; ?>'>&rsaquo; Add Sub Companies </a>

				</div>
                <div class="card-body">
					<div class="card-body">
						{{Form::open(array('url' => 'appmerchant/branch/add', 'method' => 'post', 'files' => true
						,'enctype'=>'multipart/form-data'))}}
						
						
							<div class="form-group row">
								<label for="name">Type</label>
								<select name="typebranchid" id='typebranchid' class="form-control  form-control-lg form-control-solid"  placeholder="Type" required>
									<option value = ''>Choose Type </option>
									@foreach($typs as $typ)
										<option value = {{ $typ->id }} > {{$typ->name}} </option>
									@endforeach 
								</select>	
							</div>	
						
						
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
								<input type="text" name="name" 
								class="form-control  form-control-lg form-control-solid" required  placeholder="Name">	
							</div>
							
							<div class="form-group row">
								<label for="name">Mobile</label>
								<input type="text" name="mobile" class="form-control  form-control-lg form-control-solid" placeholder="mobile">	
							</div>
							
							<div class="form-group row">
								<label for="name">Phone</label>
								<input type="text" name="phone" class="form-control  form-control-lg form-control-solid" placeholder="phone">	
							</div>
							
							<div class="form-group row">
								Short Details
							</div>
							<div class="form-group row">
								<textarea class="form-control  form-control-lg form-control-solid"  name="des" style = 'max-width:700px;'></textarea>	
							</div>
							
							<div class="form-group row">
								Full Details
							</div>
							<div class="form-group row">
								<textarea class="form-control  form-control-lg form-control-solid"  name="dess"></textarea>	
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

<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'dess' ,
{
width: '900px',
height: '400px',
}); 

 
</script>

@endsection
