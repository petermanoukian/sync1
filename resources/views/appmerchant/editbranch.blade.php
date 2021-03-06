@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
				
				<div class = 'floatleft'>
				<h1 class='text-dark fw-bolder fs-2 margintop7'>Edit Branch</h1>
				</div> 
				<div class = 'floatleft'>
				<a  href ='/appmerchant/addbranch' class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Add Branches </a>
				<a  href ='/appmerchant/viewbranch' class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Branches </a>
				<a  href ='/appmerchant/viewcompany' class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Companies </a>
				<a  href ='/appmerchant/addcompany' class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Add Companies </a>
				<a  href ='/appmerchant/viewsubcompany'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Sub Companies </a>
				<a  href ='/appmerchant/addsubcompany'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Add Sub Companies </a>
				<a  href ='/appmerchant/viewcompany' class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Companies </a>
				
				</div>

				</div>
                <div class="card-body">
					<div class="card-body">
						{!! Form::model($row, ['route' => ['branchUpdate.route', $row->id],
						'method' => 'PATCH',
						'class' => 'form',
						 'files' => true
						,'enctype'=>'multipart/form-data'
						]) !!}
						
						
							<div class="form-group row">
								<label for="name">Branch Type</label>
								<select name="typebranchid" id='typebranchid' class="form-control  form-control-lg form-control-solid"   required>
									
								@foreach($typs as $typ)	
									@if($row->typebranchid == $typ->id)
										<option value = {{ $typ->id }} selected> {{$typ->name}} </option>
									@else 
										<option value = {{ $typ->id }} > {{$typ->name}} </option>
									@endif
								@endforeach 
								</select>	
							</div>
						
						
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
								<label for="name">Mobile</label>
								<input type="text" name="mobile" class="form-control  form-control-lg form-control-solid"  placeholder="Name"
								value = "{{$row->mobile}}">	
							</div>
							
							<div class="form-group row">
								<label for="name">Phone</label>
								<input type="text" name="phone" class="form-control  form-control-lg form-control-solid"  placeholder="Name"
								value = "{{$row->phone}}">	
							</div>
							
							
							<div class="form-group row">
								Short Details
							</div>
							<div class="form-group row">
								<textarea class="form-control  form-control-lg form-control-solid"  name="des" style = 'max-width:700px;'>{!! $row->des !!}</textarea>	
							</div>
							
							<div class="form-group row">
								Full Details
							</div>
							<div class="form-group row">
								<textarea class="form-control  form-control-lg form-control-solid"  name="dess">{!! $row->dess !!}</textarea>	
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
			url: "{{ route('getsubcomsbycomp') }}?compid=" + {{ request()->route('compid') }} + "&subcompid=" + {{ request()->route('subcompid') }},	
			method: 'GET',
			success: function(data) {

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

<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'dess' ,
{
width: '900px',
height: '400px',
}); 

 
</script>

@endsection


