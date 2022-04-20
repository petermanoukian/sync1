@extends('layouts.appadmin')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

				
				
				<div class="card-header"> 
				<div class = 'floatleft'>
				<h1 class='text-dark fw-bolder fs-2 margintop7'>Rols</h1>
				</div> 
				<div class = 'floatleft'>
				<a  href ='/appadmin/addrolecat'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'> Add Roles  </a>
				
				</div>
				</div>

                <div class="card-body">
					
					<table class="table align-middle table-row-dashed fs-6 gy-5 data-table" >
							<thead>
								<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
									<th style = 'width:3%;'>No</th>
									<th style = 'width:35%;'> Name</th>
	
									<th style = 'width:62%;'>Action</th>
								</tr>
							</thead>
							<tbody class="fw-bold text-gray-600">
							</tbody>


						</table>
						
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">

  $(function () {
   
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: false,
		pageLength: 30,
        ajax: "{{ route('viewRolecat.route') }}",
        columns: [
			{data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
			
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
		"order": [[ 0, "desc" ]]
    });
    
  });
</script>


<script>
function do_this(){

	var checkboxes = document.getElementsByName('idx[]');
	var button = document.getElementById('toggle');

	if(button.value == 'select'){
		for (var i in checkboxes){
			checkboxes[i].checked = 'FALSE';
		}
		button.value = 'deselect'
	}else{
		for (var i in checkboxes){
			checkboxes[i].checked = '';
		}
		button.value = 'select';
	}
}
</script>

@endsection

