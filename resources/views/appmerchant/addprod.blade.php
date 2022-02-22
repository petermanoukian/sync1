@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
				 <div class = 'floatleft'><h1 class='text-dark fw-bolder fs-2 margintop7'> Add Product</h1></div> 
				 <div class = 'floatleft'>
				
				
				
				<a  href ='/appmerchant/viewcompany'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Companies </a>
				<a  href ='/appmerchant/addcompany'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Add Companies </a>
				<a  href ='/appmerchant/viewsubcompany/<?php echo $compid ; ?>'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Sub Companies </a>
				<a  href ='/appmerchant/addsubcompany/<?php echo $compid ; ?>'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Add Sub Companies </a>
				<a  href ='/appmerchant/viewsubsubcompany/<?php echo $compid ; ?>/<?php echo $subcompid ; ?>'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>
				 Sub Sub Companies </a>
				<a  href ='/appmerchant/viewprod/<?php echo $compid ; ?>/<?php echo $subcompid ; ?>/<?php echo $subsubcompid ; ?>'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>
				 View Products </a>
				</div>
				</div>
                <div class="card-body">
					<div class="card-body">
						{{Form::open(array('url' => 'appmerchant/prod/add', 'method' => 'post', 'files' => true
						,'enctype'=>'multipart/form-data'))}}
						
							<div class="form-group row">
								<label for="name">Company</label>
								<select name="compid" id='compid' class="form-control  form-control-lg form-control-solid"  
								placeholder="Company" required>
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
								<label for="city">Sub Company</label>
								<div id = 'subcompid2'>Choose a Company First</div>
							</div>

							<div class="form-group">
								<label for="city">Sub Sub Category</label>
								<div id = 'subcompid3'>Choose a Sub Company First</div>
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
								<label for="name">Price</label>
								<input type="text" name="prix" class="form-control  form-control-lg form-control-solid" required  placeholder="Price">	
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

		@if(request()->route('subsubcompid')  && request()->route('subsubcompid') != 0 && request()->route('subsubcompid')  != '')

		<script type="text/javascript">

		$( document ).ready(function() {

			$.ajax({
url: "{{ route('getsubcomsbycomp') }}?compid=" + {{ request()->route('compid') }} + "&subcompid=" + {{ request()->route('subcompid') }},	
				method: 'GET',
				success: function(data) {
					$('#subcompid2').html(data.html);
					
					reload1();
	
				}
			});
			
			$.ajax({
url: "{{ route('getsubsubcomsbycomp') }}?subcompid=" + {{ request()->route('subcompid') }} + "&subsubcompid=" + {{ request()->route('subsubcompid') }},	
				method: 'GET',
				success: function(data) {
					$('#subcompid3').html(data.html);
					
					reload1();
					
				}
			});

		});	 

	</script>
	
		@else
			
		@endif
		
		@else
		<script type="text/javascript">
		$( document ).ready(function() {

			$.ajax({
				url: "{{ route('getsubcomsbycomp') }}?compid=" + {{ request()->route('compid') }},	
				method: 'GET',
				success: function(data) {
					$('#subcompid2').html(data.html);
					reload1();
				}
			});
			
			$.ajax({
				url: "{{ route('getsubsubcomsbycomp') }}",	
				method: 'GET',
				success: function(data) {
					$('#subcompid3').html(data.html);
					reload1();
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
					reload1();
				}
			});
			
			$.ajax({
				url: "{{ route('getsubsubcomsbycomp') }}",	
				method: 'GET',
				success: function(data) {
					$('#subcompid3').html(data.html);
					reload1();
				}
			});

		});	 
	</script>

@endif


<script type="text/javascript">


$( document ).ready(function() {
			$("#compid").change(function(){	
			 $('#subcompid2').html('....Loading Sub companies....');
			$.ajax({
				url: "{{ route('getsubcomsbycomp') }}?compid=" + $(this).val(),	
				method: 'GET',
				success: function(data) {
					$('#subcompid2').html(data.html);
					
					
							$("#subcompid").change(function(){	
							 $('#subcompid3').html('....Loading Sub sub companies....');
							$.ajax({
								url: "{{ route('getsubsubcomsbycomp') }}?subcompid=" + $(this).val(),	
								method: 'GET',
								success: function(data) {
									$('#subcompid3').html(data.html);
								}
							});
						});

				}
			});
		});
		
		$("#subcompid").change(function(){	
			 $('#subcompid3').html('....Loading Sub sub companies....');
			$.ajax({
				url: "{{ route('getsubsubcomsbycomp') }}?subcompid=" + $(this).val(),	
				method: 'GET',
				success: function(data) {
					$('#subcompid3').html(data.html);
				}
			});
		});
});


function reload1()
{
	$("#compid").change(function(){	
			 $('#subcompid2').html('....Loading Sub companies....');
			$.ajax({
				url: "{{ route('getsubcomsbycomp') }}?compid=" + $(this).val(),	
				method: 'GET',
				success: function(data) {
					$('#subcompid2').html(data.html);
					
					
							$("#subcompid").change(function(){	
							 $('#subcompid3').html('....Loading Sub sub companies....');
							$.ajax({
								url: "{{ route('getsubsubcomsbycomp') }}?subcompid=" + $(this).val(),	
								method: 'GET',
								success: function(data) {
									$('#subcompid3').html(data.html);
								}
							});
						});

				}
			});
		});
		
		$("#subcompid").change(function(){	
			 $('#subcompid3').html('....Loading Sub sub companies....');
			$.ajax({
				url: "{{ route('getsubsubcomsbycomp') }}?subcompid=" + $(this).val(),	
				method: 'GET',
				success: function(data) {
					$('#subcompid3').html(data.html);
				}
			});
		});
	
}


</script>

<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'dess' ,
{
width: '900px',
height: '400px',
}); 

 
</script>


@endsection