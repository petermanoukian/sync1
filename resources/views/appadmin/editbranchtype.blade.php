@extends('layouts.appadmin')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Branch Type | <a  href ='/appadmin/addbranchtype'>&rsaquo; Add Branch Types </a>
				| <a  href ='/appadmin/viewbranchtype'>&rsaquo;  Branch Types </a>
				</div>
                <div class="card-body">
					<div class="card-body">
						{!! Form::model($row, ['route' => ['TypebranchUpdate.route', $row->id],
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