@extends('layouts.appadmin')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
				<div class = 'floatleft'>
				<h1 class='text-dark fw-bolder fs-2 margintop7'>Add Discount To Categories</h1>
				</div>
				<div class = 'floatleft'><a  href ='/appadmin/viewdiscount'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Discounts </a>
				
				<a  href ='/appadmin/viewdiscountcat'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Discount Categories </a>
				
				</div>
				
				</div>
                <div class="card-body">
					<div class="card-body">
						{{Form::open(array('url' => 'appadmin/discountcat/add', 'method' => 'post', 'files' => true
						,'enctype'=>'multipart/form-data'))}}

							<div class="form-group row">
								<label for="name">Discount</label>
								<select name="discid" id='discid' class="form-control  form-control-lg form-control-solid"  
								placeholder="Discount" required>
									<option value = ''>Choose Discount </option>
									@foreach($discs as $disc)
										@if($discid  && $discid != 0 && $discid  == $disc->id)
											<option value = {{ $disc->id }} selected> {{$disc->name}} </option>
										@else 
											<option value = {{ $disc->id }} > {{$disc->name}} </option>
										@endif
									@endforeach 
								</select>	
							</div>

							<div class="form-group row">
								<label for="name">Category</label>
								<select name="catid[]" id='catid' class="form-control  form-control-lg form-control-solid"  
								placeholder="Category" required multiple>
									<option value = ''>Choose Category </option>
									@foreach($cats as $cat)
										<option value = {{ $cat->id }} > {{$cat->name}} </option>
									@endforeach 
								</select>	
							</div>
							
							
							
							<div class="form-group row">
								<label for="name">Title</label>
								<input type="text" name="name" class="form-control  form-control-lg form-control-solid" required  
								placeholder="Name">	
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