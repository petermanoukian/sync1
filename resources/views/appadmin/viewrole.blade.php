@extends('layouts.appadmin')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

				
				
				<div class="card-header"> 
				<div class = 'floatleft'>
				<h1 class='text-dark fw-bolder fs-2 margintop7'>Role Permisions</h1>
				</div> 
				<div class = 'floatleft'>
				<a  href ='/appadmin/addrole'
				class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'> Add Role Permissions  </a>
				
				</div>
				</div>

                <div class="card-body">
					
					<table class="table align-middle table-row-dashed fs-6 gy-5 data-table" 
					style = 'max-width:500px;'>
							<thead>
								<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
									<th style = 'width:3%;'>No</th>
									<th style = 'width:15%;'>Route Name</th>
									<th style = 'width:15%;'>Menu</th>
									<th style = 'width:24%;'>Path</th>
									<th style = 'width:13%;'>Controller</th>
									<th style = 'width:12%;'>Type</th>
									<th style = 'width:18%;'>Action</th>
								</tr>
							</thead>
							<tbody class="fw-bold text-gray-600">
							</tbody>
							<thead>
								<tr>
								<th colspan = 7 align = 'center' style = 'width:90%;text-align:center;'>
								<input type = 'submit' value = 'Delete' 
								onclick = 'return confirm("are you sure you want to remove this item");'
								class="btn btn-danger" align = 'center'>
								</th>
								</tr>
							</thead>

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
        ajax: "{{ route('viewRole.route') }}",
        columns: [
			{data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
			{data: 'menuname', name: 'menuname'},
			{data: 'methods', name: 'methods'},	
			{data: 'sectionn', name: 'sectionn'},
			{data: 'typ', name: 'typ'},				
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

