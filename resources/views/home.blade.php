@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    	@auth
					  
							@if (Auth::user()->levell === 1)
							<a class="navbar-brand" href="{{ url('/appadmin') }}"> Go to Admin Area </a>
							<script>
							location.href = "{{ url('/appadmin') }}";
							</script>
							@elseif (Auth::user()->levell === 2)
							<a class="navbar-brand" href="{{ url('/appmerchant') }}"> Go to Merchant Area </a>
							<script>
							location.href = "{{ url('/appmerchant') }}";
							</script>
							
							
							@else if (Auth::user()->levell === 4)
							<a class="navbar-brand" href="{{ url('/home') }}"> Go to Member Area </a>
							@endif
					   @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection