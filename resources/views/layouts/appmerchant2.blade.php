<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<?php 
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
	header('Access-Control-Allow-Credentials: true');	
	header("Access-Control-Allow-Origin: http://127.0.0.1"); 
	header("Access-Control-Allow-Origin: https://shofershop.app/"); 
	?>
	
 	<title>ShoferShop</title>
	
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/css.css') }}" rel="stylesheet">
	<link href="{{ asset('css/css2.css') }}" rel="stylesheet">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
	<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<script src="{{ asset('js/app.js') }}" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
 	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> 
    <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                $('#datepicker').datepicker({
                    format: "yyyy-mm-dd" ,  autoClose: true,
                }).on('change', function(){
					$('#datepicker').datepicker('hide');
				});  
             	$('#datepicker').datepicker().on('changeDate', function (ev) {
					$('#datepicker').datepicker('hide');
			
				});
            });

		$(document).on('click', '.dropdown-menu', function (e) {
		  e.stopPropagation();
		});
		
		// make it as accordion for smaller screens
		if ($(window).width() < 992) {
		  $('.dropdown-menu a').click(function(e){
			e.preventDefault();
			  if($(this).next('.submenu').length){
				$(this).next('.submenu').toggle();
			  }
			  $('.dropdown').on('hide.bs.dropdown', function () {
			 $(this).find('.submenu').hide();
		  })
		  });
		}
		
		
	function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
			$('#blah').show();
            $('#blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
		}
	}
	
	
	function readURL2(input) {
	
		if (input.files && input.files[0]) {
			var reader2 = new FileReader();
	
			reader2.onload = function (e) {
				$('#blah2').show();
				$('#blah2').attr('src', e.target.result);
			}
			reader2.readAsDataURL(input.files[0]);
		}
	}	
			
	function readURL3(input) {
	
		if (input.files && input.files[0]) {
			var reader3 = new FileReader();
	
			reader3.onload = function (e) {
				$('#blah3').show();
				$('#blah3').attr('src', e.target.result);
			}
			reader3.readAsDataURL(input.files[0]);
		}
	}	
	
	
	function readURL4(input) {
	
		if (input.files && input.files[0]) {
			var reader4 = new FileReader();
	
			reader4.onload = function (e) {
				$('#blah4').show();
				$('#blah4').attr('src', e.target.result);
			}
			reader4.readAsDataURL(input.files[0]);
		}
	}
	
	function readURL5(input) {
	
		if (input.files && input.files[0]) {
			var reader5 = new FileReader();
	
			reader5.onload = function (e) {
				$('#blah5').show();
				$('#blah5').attr('src', e.target.result);
			}
			reader5.readAsDataURL(input.files[0]);
		}
	}	
		
	</script>


    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container"> 
                <a class="navbar-brand" href="/appmerchant/merchant/{{ Request::route('storid') }}">
                   <h3>ShoferShop   </h3>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" 
								aria-haspopup="true" aria-expanded="false" v-pre>
                                    Welcome {{ Auth::user()->name }} 
									{{--
									@if (Auth::user()->conf === 1)
										Confirmed
									@else
										Unconfirmed
									@endif
									--}}
									@if (Auth::user()->is_admin === 1)
										Super Admin
									@elseif (Auth::user()->is_admin === 2)
										Merchant
									@elseif (Auth::user()->is_admin === 3)
										Merchant User
									@elseif (Auth::user()->is_admin === 4)
										User
									@endif
	
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href = '/appmerchant/editmainmerchant'> Edit Account </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
									

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>	
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
		
		
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style = 'margin-top:-4px;'>
			 <div class="container">
				<nav class="navbar navbar-expand-lg ">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					<div class="collapse navbar-collapse" id="main_nav">
						<ul class="navbar-nav">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> My Stores </a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href ='/appmerchant/viewstor'>Stores List </a></li>
									<li><a class="dropdown-item" href = '/appmerchant/addstor'> Add Store </a></li> 
								</ul>
							</li>
							<li class="nav-item dropdown">	
							<a class="nav-link" href="/appmerchant/merchant/{{ $storid }}">Home  </a>
							</li>
							

							
							
							
							<a class="nav-link"  href="/appmerchant/stordetail/{{ $storid }}">Store  </a>
							<a class="nav-link"  href="/appmerchant/viewbranch/{{ $storid }}">Branches  </a>

							<a class="nav-link"  href="/appmerchant/viewprod/{{ $storid }}">Products  </a>
							
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Users </a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="/appmerchant/viewuser/{{ $storid }}">Store Admins  </a></li>
									<li><a class="dropdown-item" href="/appmerchant/register/{{ $storid }}">Add Store Admin  </a></li>
								</ul>
							</li>
							<a class="nav-link" href="/appmerchant/orderbranchnew/{{ $storid }}">Orders  </a>

							<li class="nav-item dropdown">
								<a class="nav-link" href ='/appmerchant/reportt/prodnotfound/{{ $storid }}' > Reports </a>
							</li>

							
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Billing </a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="/appmerchant/viewbranch2/{{ $storid }}">Branches  </a></li>
									<li><a class="dropdown-item" href="/appmerchant/viewbillinfo/{{ $storid }}">Billing Info  </a></li>
									<li><a class="dropdown-item" href="/appmerchant/viewbankaccount/store/{{ $storid }}">Bank accounts </a>
									</li>
									<li><a class="dropdown-item" href="/appmerchant/viewsetl/{{ $storid }}">Settlements  </a></li>
									
								</ul>
							</li>
							
							<!--
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Product Discounts </a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href ='/appmerchant/viewdiscountt/{{ $storid }}'>Product Discounts </a></li>
									<li><a class="dropdown-item" href = '/appmerchant/adddiscountt/{{ $storid }}'> Add Product Discount </a></li> 
								</ul>
							</li>
							-->
							<a class="nav-link"  href="#">Help  </a>
 	
						</ul>
					</div>
				</nav>
			</div>
		</nav>	

        <main class="py-4">
            @yield('content')
        </main>
    </div>
	
	
	@yield('scripts')
	
</body>
</html>
