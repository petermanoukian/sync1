@if(Auth::check() && auth()->user()->conf2 == 1 && auth()->user()->conf == 1))

	 @if( Auth::check() && (auth()->user()->is_admin == 2) )
		@php
			header("Location: " . URL::to('appmerchant/merchant'), true, 302);
			exit();
		@endphp
     
	 @else 	 if( Auth::check() && (auth()->user()->is_admin == 4) )
		@php
			header("Location: " . URL::to('customer/customer'), true, 302);
			exit();
		@endphp
	 @endif
@endif

@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">Unconfirmed</div>
                <div class="card-body">
                    You have not confirmed your account 
					Click here to <a href = '/customer/reconfirmform'> &rsaquo; Resend confirmation email </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')




@endsection



