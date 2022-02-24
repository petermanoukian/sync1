@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

				<div class="card-header">
					<div class = 'floatleft'>
					<h1 class='text-dark fw-bolder fs-2 margintop7'> Edit Sub Sub Categories </h1>
					</div> 
					<div class = 'floatleft'>
						<a  href ='/appmerchant/addcat'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Add Category  </a>	
						<a  href ='/appmerchant/viewcat'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Categories </a> 
						<a  href ='/appmerchant/viewsubcat'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>View Sub Categories </a> 
						 <a  href ='/appmerchant/addsubcat'
						 class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>
						 Add Sub Categories </a> 
						<a  href ='/appmerchant/viewsubsubcat'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>
						Sub Sub Categories</a> 
						<a  href ='/appmerchant/addsubsubcat'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>
						Add Sub sub Categories </a> 
						
						
					</div>
				</div>




                <div class="card-body">
					<div class="card-body">
						{!! Form::model($row, ['route' => ['subsubCatUpdate.route', $row->id],
						'method' => 'PATCH',
						'class' => 'form',
						 'files' => true
						,'enctype'=>'multipart/form-data'
						]) !!}
						
						
							<div class="form-group row">
								<label for="name">Company</label>
								<select name="catid" id='catid' class="form-control  form-control-lg form-control-solid"   required>
									
								@foreach($cats as $cat)	
									@if($row->catid == $cat->id)
										<option value = {{ $cat->id }} selected> {{$cat->name}} </option>
									@else 
										<option value = {{ $cat->id }} > {{$cat->name}} </option>
									@endif
								@endforeach 
								</select>	
							</div>
							
						    <div class="form-group">
								<label for="city">SubCategory</label>
								<div id = 'subcatid2'>Choose a Category First</div>
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
								<img src="<?php echo asset("images/subsubcat/thumb/{$row->logo}")?>" style='margin-top:10px;clear:both'>
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


@section('scripts')

<script type="text/javascript">

	$( document ).ready(function() {

		$.ajax({
			url: "{{ route('getsubcatsbycat') }}?catid=" + {{ request()->route('catid') }} + "&subcatid=" + {{ request()->route('subcatid') }},	
			method: 'GET',
			success: function(data) {

				//alert(data.html);
				//data1 += data.html;
				$('#subcatid2').html(data.html);
			}
		});
	
	});	 




	$("#catid").change(function(){	
		 $('#subcatid2').html('....Loading Subcategories....');
		$.ajax({
			url: "{{ route('getsubcatsbycat') }}?catid=" + $(this).val(),	
			method: 'GET',
			success: function(data) {
				$('#subcatid2').html(data.html);
			}
		});
	});
</script>

@endsection


