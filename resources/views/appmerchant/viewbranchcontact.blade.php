@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
				
				
					<div class = 'floatleft'>
					<h1 class='text-dark fw-bolder fs-2 margintop7'>Branch Contacts</h1>
					</div> 
					<div class = 'floatleft'>
					<a  href ='/appmerchant/viewbranch' class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>View Branches </a>
					<a  href ='/appmerchant/addbranch' class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'>Add Branches </a>
					
					<a  href ='/appmerchant/addbranch/<?php echo $branchid ; ?>'
					class='edit btn btn-primary btn-sm margintop7 paddtop6 bold'> Add Branch Contacts </a> 
					</div>
				
	
				</div>
                <div class="card-body">
                    
					
					<form method = 'post' action = "/appmerchant/branchcontact/deleteall">
						<input name="_method" type="hidden" value="DELETE">
						@csrf
						<table class="table align-middle table-row-dashed fs-6 gy-5 data-table" >
							<thead>
								<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
									<th width = '2%'>
										<input type = 'checkbox' name = 'idr' id="toggle" value="select" onClick="do_this()"
										class="form-check-input"  data-kt-check="true"/>
									</th>
									<th style = 'width:2%;'>No</th>
									<th style = 'width:20%;'>Name</th>
									<th style = 'width:20%;'>Company</th>
									<th style = 'width:20%;'>SubCompany</th>
									<th style = 'width:18%;'>Branch</th>
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
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<?php
if(isset($branchid) && $branchid != '' && $branchid > 0)
{

		
?>
		<script type="text/javascript">		
		
			
			$(function () {
		   
			var table = $('.data-table').DataTable({
				processing: true,
				serverSide: false,
				ajax: "{{ url('/appmerchant/viewbranchcontact/' . request()->route('branchid')) }}",
				columns: [
					{data: 'Delete1', name: 'Delete1', orderable: false, searchable: false},
					{data: 'id', name: 'id'},
					{data: 'name', name: 'name'},
					{data: 'Company', name: 'Company'},
					{data: 'SubCompany', name: 'SubCompany'},
					{data: 'Branch', name: 'Branch'},
					{data: 'action', name: 'action', orderable: false, searchable: false},
				],
				"order": [[ 0, "desc" ]]
			});
			
		  });
		</script>



<?php
}


?>


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

