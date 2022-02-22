@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					Sub Companies | <a  href ='/appmerchant/addcompany'>&rsaquo; Add Company  </a>	
					|  <a  href ='/appmerchant/viewcompany'>&rsaquo; Companies </a> 
					|  <a  href ='/appmerchant/viewsubcompany/<?php echo $compid ; ?>'>&rsaquo; View Sub Companies </a> 
					|  <a  href ='/appmerchant/addsubcompany/<?php echo $compid ; ?>'>
					&rsaquo; Add Sub Companies </a> 
					|  <a  href ='/appmerchant/addsubsubcompany/<?php echo $compid ; ?>/<?php echo $subcompid ; ?>'>
					&rsaquo; Add Sub sub Companies </a> 
				</div>
                <div class="card-body">
                    
					
					<form method = 'post' action = "/appmerchant/subsubcompany/deleteall">
						<input name="_method" type="hidden" value="DELETE">
						@csrf
						<table class="table align-middle table-row-dashed fs-6 gy-5 data-table" >
								<thead>
									<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
										<th width = '2%'>
											<input type = 'checkbox' name = 'idr' id="toggle" value="select" onClick="do_this()"
											class="form-check-input"  data-kt-check="true"/>
										</th>
										<th style = 'width:8%;'>No</th>
										<th style = 'width:20%;'>Name</th>
										<th style = 'width:20%;'>Company</th>
										<th style = 'width:20%;'>SubCompany</th>
										<th style = 'width:20%;'>Image</th>
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
if(isset($compid) && $compid != '' && $compid > 0)
{
	if(isset($subcompid) && $subcompid != '' && $subcompid > 0)
	{	
		
?>
		<script type="text/javascript">		
			var compid = <?php echo $compid ; ?>;

			var url2 = '/appmerchant/viewsubsubcompany/'+compid+'/';
			//ajax: "{{ url('/appadmin/viewarticle/' . request()->route('catid')) }}",
			
			$(function () {
		   
			var table = $('.data-table').DataTable({
				processing: true,
				serverSide: false,
				ajax: "{{ url('/appmerchant/viewsubsubcompany/' . request()->route('compid') . '/' .  request()->route('subcompid')) }}",
				columns: [
					{data: 'Delete1', name: 'Delete1', orderable: false, searchable: false},
					{data: 'id', name: 'id'},
					{data: 'name', name: 'name'},
					{data: 'Company', name: 'Company'},
					{data: 'SubCompany', name: 'SubCompany'},
					{data: 'Image', name: 'Image'},
					{data: 'action', name: 'action', orderable: false, searchable: false},
				],
				"order": [[ 0, "desc" ]]
			});
			
		  });
		</script>

	<?php
	}
	else
	{
	?>
		<script type="text/javascript">		
			var compid = <?php echo $compid ; ?>;

			var url2 = '/appmerchant/viewsubsubcompany/'+compid+'/';
			//ajax: "{{ url('/appadmin/viewarticle/' . request()->route('catid')) }}",
			
			$(function () {
		   
			var table = $('.data-table').DataTable({
				processing: true,
				serverSide: false,
				ajax: "{{ url('/appmerchant/viewsubsubcompany/' . request()->route('compid')) }}",
				columns: [
					{data: 'Delete1', name: 'Delete1', orderable: false, searchable: false},
					{data: 'id', name: 'id'},
					{data: 'name', name: 'name'},
					{data: 'Company', name: 'Company'},
					{data: 'SubCompany', name: 'SubCompany'},
					{data: 'Image', name: 'Image'},
					{data: 'action', name: 'action', orderable: false, searchable: false},
				],
				"order": [[ 0, "desc" ]]
			});
			
		  });
		</script>
	<?php
	}
	?>

<?php
}
else
{

?>
<script type="text/javascript">

  $(function () {
   
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: false,
        ajax: "{{ route('viewsubsubCompany.route') }}",
        columns: [
			{data: 'Delete1', name: 'Delete1', orderable: false, searchable: false},
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
			{data: 'Company', name: 'Company'},
			{data: 'SubCompany', name: 'SubCompany'},
			{data: 'Image', name: 'Image'},
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

