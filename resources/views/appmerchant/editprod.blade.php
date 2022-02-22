@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Product
				| <a  href ='/appmerchant/viewcompany'>&rsaquo; Companies </a>
				| <a  href ='/appmerchant/addcompany'>&rsaquo; Add Companies </a>
				| <a  href ='/appmerchant/viewsubcompany'>&rsaquo; Sub Companies </a>
				| <a  href ='/appmerchant/addsubcompany'>&rsaquo; Add Sub Companies </a>
				| <a  href ='/appmerchant/viewprod'>&rsaquo; Products </a>
				| <a  href ='/appmerchant/addprod'>&rsaquo; Add Products </a>
				
				</div>
                <div class="card-body">
					<div class="card-body">
						{!! Form::model($row, ['route' => ['prodUpdate.route', $row->id],
						'method' => 'PATCH',
						'class' => 'form',
						 'files' => true
						,'enctype'=>'multipart/form-data'
						]) !!}
						
						
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
								<label for="city">Sub Company</label>
								<div id = 'subcompid2'>Choose a Company First</div>
							</div>

							<div class="form-group">
								<label for="city">Sub Sub Category</label>
								<div id = 'subcompid3'>Choose a Sub Company First</div>
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


