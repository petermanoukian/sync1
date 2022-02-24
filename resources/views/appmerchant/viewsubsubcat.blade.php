@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class = 'floatleft'>
					<h1 class='text-dark fw-bolder fs-2 margintop7'> Sub Categories </h1>
					</div> 
					<div class = 'floatleft'>
						<a  href ='/appmerchant/addcat'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Add Category  </a>	
						<a  href ='/appmerchant/viewcat'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Categories </a> 
						<a  href ='/appmerchant/viewsubcat/<?php echo $catid ; ?>'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>&rsaquo; View Sub Categories </a> 
						 <a  href ='/appmerchant/addsubcat/<?php echo $catid ; ?>'
						 class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>
						 Add Sub Categories </a> 
						<a  href ='/appmerchant/addsubsubcat/<?php echo $catid ; ?>/<?php echo $subcatid ; ?>'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>
						Add Sub sub Categories </a> 
					</div>
				</div>
                <div class="card-body">
                    
					
					<form method = 'post' action = "/appmerchant/subsubcat/deleteall">
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
										<th style = 'width:20%;'>Category</th>
										<th style = 'width:20%;'>SubCategory</th>
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
if(isset($catid) && $catid != '' && $catid > 0)
{
	if(isset($subcatid) && $subcatid != '' && $subcatid > 0)
	{	
		
?>
		<script type="text/javascript">		
			var catid = <?php echo $catid ; ?>;

			var url2 = '/appmerchant/viewsubsubcat/'+catid+'/';
			//ajax: "{{ url('/appadmin/viewarticle/' . request()->route('catid')) }}",
			
			$(function () {
		   
			var table = $('.data-table').DataTable({
				processing: true,
				serverSide: false,
				ajax: "{{ url('/appmerchant/viewsubsubcat/' . request()->route('catid') . '/' .  request()->route('subcatid')) }}",
				columns: [
					{data: 'Delete1', name: 'Delete1', orderable: false, searchable: false},
					{data: 'id', name: 'id'},
					{data: 'name', name: 'name'},
					{data: 'Cat', name: 'Cat'},
					{data: 'SubCat', name: 'SubCat'},
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
			
			
			$(function () {
		   
			var table = $('.data-table').DataTable({
				processing: true,
				serverSide: false,
				ajax: "{{ url('/appmerchant/viewsubsubcat/' . request()->route('catid')) }}",
				columns: [
					{data: 'Delete1', name: 'Delete1', orderable: false, searchable: false},
					{data: 'id', name: 'id'},
					{data: 'name', name: 'name'},
					{data: 'Cat', name: 'Cat'},
					{data: 'SubCat', name: 'SubCat'},
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
        ajax: "{{ route('viewsubsubCat.route') }}",
        columns: [
			{data: 'Delete1', name: 'Delete1', orderable: false, searchable: false},
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
			{data: 'Cat', name: 'Cat'},
			{data: 'SubCat', name: 'SubCat'},
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

