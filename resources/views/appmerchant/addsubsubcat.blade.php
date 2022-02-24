@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

				<div class="card-header">
					<div class = 'floatleft'>
					<h1 class='text-dark fw-bolder fs-2 margintop7'> Sub sub Categories </h1>
					</div> 
					<div class = 'floatleft'>
						<a  href ='/appmerchant/addcat'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Add Category  </a>	
						<a  href ='/appmerchant/viewcat'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Categories </a> 
						<a  href ='/appmerchant/viewsubcat/<?php echo $catid ; ?>'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>View Sub Categories </a> 
						 <a  href ='/appmerchant/addsubcat/<?php echo $catid ; ?>'
						 class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>
						 Add Sub Categories </a> 
						<a  href ='/appmerchant/viewsubsubcat/<?php echo $catid ; ?>/<?php echo $subcatid ; ?>'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>
						Sub Sub Categories</a> 
					</div>
				</div>
				
				
				
				
                <div class="card-body">
					<div class="card-body">
						{{Form::open(array('url' => 'appmerchant/subsubcat/add', 'method' => 'post', 'files' => true
						,'enctype'=>'multipart/form-data'))}}
						
							<div class="form-group row">
								<label for="name">Category</label>
								<select name="catid" id='catid' class="form-control  form-control-lg form-control-solid"  placeholder="Company" required>
									<option value = ''>Choose Category </option>
									@foreach($cats as $cat)
										@if($catid  && $catid != 0 && $catid  == $cat->id)
											<option value = {{ $cat->id }} selected> {{$cat->name}} </option>
										@else 
											<option value = {{ $cat->id }} > {{$cat->name}} </option>
										@endif
									@endforeach 
								</select>	
							</div>
							
							<div class="form-group">
								<label for="subcomany">Sub Category</label>
								<div id = 'subcatid2'>Choose a Category First</div>
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


@if(request()->route('catid')  && request()->route('catid') != 0 && request()->route('catid')  != '')

@if(request()->route('subcatid')  && request()->route('subcatid') != 0 && request()->route('subcatid')  != '')

<script type="text/javascript">



	$( document ).ready(function() {

		$.ajax({
			url: "{{ route('getsubcatsbycat') }}?catid=" + {{ request()->route('catid') }} + "&subcatid=" + {{ request()->route('subcatid') }},	
			method: 'GET',
			success: function(data) {
				$('#subcatid2').html(data.html);
			}
		});
	});	 

	$("#catid").change(function(){	
		 $('#subcatid2').html('....Loading Sub catanies....');
		$.ajax({
			url: "{{ route('getsubcatsbycat') }}?catid=" + $(this).val(),	
			method: 'GET',
			success: function(data) {
				$('#subcatid2').html(data.html);
			}
		});
	});
</script>
@else 
<script type="text/javascript">



	$( document ).ready(function() {

		$.ajax({
			url: "{{ route('getsubcatsbycat') }}?catid=" + {{ request()->route('catid') }},	
			method: 'GET',
			success: function(data) {
				$('#subcatid2').html(data.html);
			}
		});
	});	 

	$("#catid").change(function(){	
		 $('#subcatid2').html('....Loading Sub categories....');
		$.ajax({
			url: "{{ route('getsubcatsbycat') }}?catid=" + $(this).val(),	
			method: 'GET',
			success: function(data) {
				$('#subcatid2').html(data.html);
			}
		});
	});
</script>
@endif


@else 
	
<script type="text/javascript">



	$( document ).ready(function() {

		$.ajax({
			url: "{{ route('getsubcatsbycat') }}",		
			method: 'GET',
			success: function(data) {
				$('#subcatid2').html(data.html);
			}
		});
	});	 

	$("#catid").change(function(){	
	
		 $('#subcatid2').html('....Loading Sub categories....');
		$.ajax({
			url: "{{ route('getsubcatsbycat') }}?catid=" + $(this).val(),	
			method: 'GET',
			success: function(data) {
				$('#subcatid2').html(data.html);
			}
		});
	});
</script>


@endif



@endsection
