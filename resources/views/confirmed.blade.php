@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">confirmed</div>
                <div class="card-body">
                    You have Succesfully confirmed your account with the email   {{ $email2  }}
					
					@guest
					<br />
					 Otherwise go to  <a class="navbar-brand" href="{{ url('/login') }}"> Go to Login Area </a>
					  @endguest
					  
					  @auth
					  
							@if (Auth::user()->is_admin === 2)
							<a class="navbar-brand" href="{{ url('/merchant') }}"> Go to Admin Area </a>
						
							@if (Auth::user()->is_admin === 2)
							<a class="navbar-brand" href="{{ url('/merchant') }}"> Go to Merchant Area </a>
							@else if (Auth::user()->is_admin === 4)
							<a class="navbar-brand" href="{{ url('/home') }}"> Go to Member Area </a>
							@endif
					   @endauth
					 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection