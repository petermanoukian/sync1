@extends('layouts.appadmin')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
				
				<div class = 'floatleft'>
				<h1 class='text-dark fw-bolder fs-2 margintop7'>Edit Product Division</h1>
				</div>
				<div class = 'floatleft'>
					<a  href ='/appadmin/adddiv'
					class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Add Product Division </a>
					<a  href ='/appadmin/viewdiv'
					class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Product Divisions </a>
				</div>
				
	
				</div>
                <div class="card-body">
					<div class="card-body">
						{!! Form::model($row, ['route' => ['DivUpdate.route', $row->id],
						'method' => 'PATCH',
						'class' => 'form',
						 'files' => true
						,'enctype'=>'multipart/form-data'
						]) !!}

							<div class="form-group row">
								<label for="name">Title</label>
								<input type="text" name="name" class="form-control  form-control-lg form-control-solid" required  placeholder="Name"
								value = "{{$row->name}}">	
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