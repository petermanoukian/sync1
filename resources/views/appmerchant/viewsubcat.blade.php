@extends('layouts.appmerchant')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class = 'floatleft'><h1 class='text-dark fw-bolder fs-2 margintop7'> Sub Categories </h1></div> 
					 <div class = 'floatleft'>	<a  href ='/appmerchant/viewcat'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'>Categories </a>
						<a  href ='/appmerchant/addcat'
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'> Add Categories </a>	
						<a  href ="/appmerchant/addsubcat/<?php echo $catid ; ?>/"
						class='edit btn btn-primary btn-sm margintop7 paddtop6 bold left'> Add Sub Categories </a> 
					</div>

				</div>
                <div class="card-body">
                    
					
					<form method = 'post' action = "/appmerchant/subcat/deleteall">
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
									<th style = 'width:25%;'>Name</th>
									<th style = 'width:25%;'>Category</th>
									
									<th style = 'width:25%;'>Image </th>
									<th style = 'width:18%;'>Action</th>
								</tr>
							</thead>
							<tbody class="fw-bold text-gray-600">
							</tbody>
							<thead>
								<tr>
								<th colspan = 6 align = 'center' style = 'width:90%;text-align:center;'>
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
?>

<script type="text/javascript">		

	$(function () {
   
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: false,
        ajax: "{{ url('/appmerchant/viewsubcat/' . request()->route('catid')) }}",
        columns: [
			{data: 'Delete1', name: 'Delete1', orderable: false, searchable: false},
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
			{data: 'Cat', name: 'Cat'},
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
        ajax: "{{ route('viewsubCat.route') }}",
        columns: [
			{data: 'Delete1', name: 'Delete1', orderable: false, searchable: false},
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
			{data: 'Cat', name: 'Cat'},
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

