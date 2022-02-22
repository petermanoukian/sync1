@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
				
				<div class = 'floatleft'>
				<h1 class='text-dark fw-bolder fs-2 margintop7'>Edit Branch Contacts</h1>
				</div> 
				<div class = 'floatleft'>
				<a  href ='/appmerchant/addbranch' class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Add Branches </a>
				<a  href ='/appmerchant/viewbranch' class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Branches </a>
				
				<a  href ="/appmerchant/addbranchcontact/<?php echo $row->branchid ; ?>"
					class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'> Add Branch Contacts </a> 
				<a  href ="/appmerchant/viewbranchcontact/<?php echo $row->branchid ; ?>"
					class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'> View Branch Contacts </a> 
				
				</div>

				</div>
                <div class="card-body">
					<div class="card-body">
						{!! Form::model($row, ['route' => ['branchcontactUpdate.route', $row->id],
						'method' => 'PATCH',
						'class' => 'form',
						 'files' => true
						,'enctype'=>'multipart/form-data'
						]) !!}
						
						
							<input type = 'hidden' name =  'branchid' value = "{{$row->branchid}}" />

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
								Address
							</div>
							<div class="form-group row">
								<textarea class="form-control  form-control-lg form-control-solid"  name="dess">{!! $row->address !!}</textarea>	
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



<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'dess' ,
{
width: '900px',
height: '400px',
}); 

 
</script>

@endsection


