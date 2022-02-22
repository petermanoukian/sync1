<!doctype html>

<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<?php 
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
		header('Access-Control-Allow-Credentials: true');	
		header("Access-Control-Allow-Origin: http://127.0.0.1"); 
		
	?>
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet">
 	<title>Sync 1</title>
	
	

	<link href="{{ asset('css/css.css') }}" rel="stylesheet">
	<link href="{{ asset('css/css2.css') }}" rel="stylesheet">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	

	
	

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
	
	
	<body id="kt_body" style="background-image: url()" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside aside-extended" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
					<!--begin::Primary-->
				
				
					<div class="aside-secondary d-flex flex-row-fluid">
						<!--begin::Workspace-->
						<div class="aside-workspace my-5 p-5" id="kt_aside_wordspace">
							<div class="d-flex h-100 flex-column">
								<!--begin::Wrapper-->
								<div class="flex-column-fluid hover-scroll-y" data-kt-scroll="true" data-kt-scroll-activate="true" 
								data-kt-scroll-height="auto" 
								data-kt-scroll-wrappers="#kt_aside_wordspace" data-kt-scroll-dependencies="#kt_aside_secondary_footer" data-kt-scroll-offset="0px">
									<!--begin::Tab content-->
									<div class="tab-content">
						
										<div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10" id="kt_aside_logo">
											<a href="../../demo7/dist/index.html">
												<img alt="Logo" src="assets/media/logos/logo-demo7.svg" class="h-35px" />
											</a>
										</div>

										<div class="" id="kt_aside_nav_tab_menu" >
											<!--begin::Menu-->
											<div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary 
											menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 px-6 my-5 my-lg-0" id="kt_aside_menu"
											 data-kt-menu="true">
												<div id="kt_aside_menu_wrapper" class="menu-fit">
													<div class="menu-item">
														<div class="menu-content pb-2">
															<span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard </span>
														</div>
													</div>
													<div class="menu-item">
														<a class="menu-link active" href="../../demo7/dist/index.html">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">Default</span>
														</a>
														
														
													   <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
								
								            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>	
														
														
														
														
													</div>
													<div class="menu-item">
														<a class="menu-link" href="../../demo7/dist/landing.html">
													
														</a>
													</div>
								
													<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
												
														<div class="menu-sub menu-sub-accordion menu-active-bg">
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Profile</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/profile/overview.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Overview</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/profile/projects.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Projects</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/profile/campaigns.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Campaigns</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/profile/documents.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Documents</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/profile/connections.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Connections</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/profile/activity.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Activity</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Projects</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/projects/list.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">My Projects</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/projects/project.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">View Project</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/projects/targets.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Targets</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/projects/budget.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Budget</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/projects/users.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Users</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/projects/files.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Files</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/projects/activity.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Activity</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/projects/settings.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Settings</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Wizards</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/wizards/horizontal.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Horizontal</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/wizards/vertical.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Vertical</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Search</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/search/horizontal.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Horizontal</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/search/vertical.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Vertical</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Blog</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/blog/home.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Blog Home</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/blog/post.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Blog Post</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Company</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/company/about.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">About Us</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/company/pricing.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Pricing</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/company/contact.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Contact Us</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/company/team.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Our Team</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/company/licenses.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Licenses</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/company/sitemap.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Sitemap</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Careers</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/careers/list.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Careers List</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/careers/apply.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Careers Apply</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">FAQ</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/faq/classic.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Classic</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/pages/faq/extended.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Extended</span>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
		
														<div class="menu-sub menu-sub-accordion menu-active-bg">
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/account/overview.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Overview</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/account/settings.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Settings</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/account/security.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Security</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/account/billing.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Billing</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/account/statements.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Statements</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/account/referrals.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Referrals</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/account/api-keys.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">API Keys</span>
																</a>
															</div>
														</div>
													</div>
													<div data-kt-menu-trigger="click" class="menu-item menu-accordion">

														<div class="menu-sub menu-sub-accordion menu-active-bg">
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Basic Flow</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/basic/sign-in.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Sign-in</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/basic/sign-up.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Sign-up</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/basic/two-steps.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Two-steps</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/basic/password-reset.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Password Reset</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/basic/new-password.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">New Password</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Aside Flow</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/aside/sign-in.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Sign-in</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/aside/sign-up.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Sign-up</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/aside/two-steps.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Two-steps</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/aside/password-reset.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Password Reset</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/aside/new-password.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">New Password</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Dark Flow</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/dark/sign-in.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Sign-in</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/dark/sign-up.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Sign-up</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/dark/two-steps.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Two-steps</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/dark/password-reset.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Password Reset</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/flows/dark/new-password.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">New Password</span>
																		</a>
																	</div>
																</div>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/authentication/extended/multi-steps-sign-up.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Multi-steps Sign-up</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/authentication/extended/free-trial-sign-up.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Free Trial Sign-up</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/authentication/extended/coming-soon.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Coming Soon</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/authentication/general/welcome.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Welcome Message</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/authentication/general/verify-email.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Verify Email</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/authentication/general/password-confirmation.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Password Confirmation</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/authentication/general/deactivation.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Account Deactivation</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/authentication/general/error-404.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Error 404</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/authentication/general/error-500.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Error 500</span>
																</a>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Email Templates</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/email/verify-email.html" target="blank">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Verify Email</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/email/invitation.html" target="blank">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Account Invitation</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/email/password-reset.html" target="blank">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Password Reset</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/authentication/email/password-change.html" target="blank">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Password Changed</span>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											
														<div class="menu-sub menu-sub-accordion menu-active-bg">
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">General</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/general/invite-friends.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Invite Friends</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/general/view-users.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">View Users</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/general/select-users.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Select Users</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/general/upgrade-plan.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Upgrade Plan</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/general/share-earn.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Share &amp; Earn</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Forms</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/forms/new-target.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">New Target</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/forms/new-card.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">New Card</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/forms/new-address.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">New Address</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/forms/create-api-key.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Create API Key</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Wizards</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/wizards/two-factor-authentication.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Two Factor Auth</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/wizards/create-app.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Create App</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/wizards/create-account.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Create Account</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/wizards/create-project.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Create Project</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/wizards/offer-a-deal.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Offer a Deal</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Search</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion menu-active-bg">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/search/users.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Users</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/modals/search/select-location.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Select Location</span>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											
														<div class="menu-sub menu-sub-accordion menu-active-bg">
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/widgets/lists.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Lists</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/widgets/statistics.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Statistics</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/widgets/charts.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Charts</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/widgets/mixed.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Mixed</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/widgets/tables.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Tables</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/widgets/feeds.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Feeds</span>
																</a>
															</div>
														</div>
													</div>

													<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									
														<div class="menu-sub menu-sub-accordion">
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/customers/getting-started.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Getting Started</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/customers/list.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Customer Listing</span>
																</a>
															</div>
							<div class="menu-item">
										<a class="menu-link" href="../../demo7/dist/apps/customers/view.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Customer Details</span>
										</a>
									</div>
								</div>
							</div>
							
	
	
<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
	<span class="menu-link">

		<span class="menu-title">Account  </span>
		<span class="menu-arrow"></span>
	</span>
	<div class="menu-sub menu-sub-accordion">
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
		
			
				<div class="menu-item">

			
						<span class="menu-title">
							<a  class="menu-link"  href="#" role="button" aria-expanded="false" v-pre>
								<span class="menu-title">{{ Auth::user()->name }}  </span>
							</a>
						</span>
					
				</div>
				<div class="menu-item">
					

						<span class="menu-title">
						
							<a class="menu-link"  href="{{ route('logout') }}"
							   onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>	
						
						
						
						</span>
					</a>
				</div>
			</div>
		</div>

	
</div>	


<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
	<span class="menu-link">

		<span class="menu-title">Sub Company Type</span>
		<span class="menu-arrow"></span>
	</span>
	<div class="menu-sub menu-sub-accordion">
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
		
			
				<div class="menu-item">
					<a class="menu-link" href="/appadmin/addsubcompanytype">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">Add Sub Company Type</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link" href="/appadmin/viewsubcompanytype">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">View Sub Company Type</span>
					</a>
				</div>
			</div>
		</div>

	
</div>


<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
	<span class="menu-link">

		<span class="menu-title">Branch Type Type</span>
		<span class="menu-arrow"></span>
	</span>
	<div class="menu-sub menu-sub-accordion">
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
		
			
				<div class="menu-item">
					<a class="menu-link" href="/appadmin/addbranchtype">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">Add Branch Type</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link" href="/appadmin/viewbranchtype">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">View Branch Type</span>
					</a>
				</div>
			</div>
		</div>

	
</div>
		


													
													
													
													
													
													
													<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
														<span class="menu-link">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen051.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black" />
																		<path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">User Management</span>
															<span class="menu-arrow"></span>
														</span>
														<div class="menu-sub menu-sub-accordion">
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Users</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/apps/user-management/users/list.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Users List</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/apps/user-management/users/view.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">View User</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Roles</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/apps/user-management/roles/list.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Roles List</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/apps/user-management/roles/view.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">View Role</span>
																		</a>
																	</div>
																</div>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/user-management/permissions.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Permissions</span>
																</a>
															</div>
														</div>
													</div>
													<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
														<span class="menu-link">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z" fill="black" />
																		<path opacity="0.3" d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">Support Center</span>
															<span class="menu-arrow"></span>
														</span>
														<div class="menu-sub menu-sub-accordion">
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/support-center/overview.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Overview</span>
																</a>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Tickets</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/apps/support-center/tickets/list.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Tickets List</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/apps/support-center/tickets/view.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">View Ticket</span>
																		</a>
																	</div>
																</div>
															</div>
															<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
																<span class="menu-link">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Tutorials</span>
																	<span class="menu-arrow"></span>
																</span>
																<div class="menu-sub menu-sub-accordion">
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/apps/support-center/tutorials/list.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Tutorials List</span>
																		</a>
																	</div>
																	<div class="menu-item">
																		<a class="menu-link" href="../../demo7/dist/apps/support-center/tutorials/post.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
																			<span class="menu-title">Tutorial Post</span>
																		</a>
																	</div>
																</div>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/support-center/faq.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">FAQ</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/support-center/licenses.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Licenses</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/support-center/contact.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Contact Us</span>
																</a>
															</div>
														</div>
													</div>
													<div class="menu-item">
														<a class="menu-link" href="../../demo7/dist/apps/calendar.html">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
																		<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
																		<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">Calendar</span>
														</a>
													</div>
													<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
														<span class="menu-link">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="black" />
																		<rect x="6" y="12" width="7" height="2" rx="1" fill="black" />
																		<rect x="6" y="7" width="12" height="2" rx="1" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">Chat</span>
															<span class="menu-arrow"></span>
														</span>
														<div class="menu-sub menu-sub-accordion">
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/chat/private.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Private Chat</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/chat/group.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Group Chat</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/chat/drawer.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Drawer Chat</span>
																</a>
															</div>
														</div>
													</div>
													<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
														<span class="menu-link">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="black" />
																		<path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black" />
																		<path d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">File Manager</span>
															<span class="menu-arrow"></span>
														</span>
														<div class="menu-sub menu-sub-accordion">
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/file-manager/folders.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Folders</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/file-manager/files.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Files</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/file-manager/blank.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Blank Directory</span>
																</a>
															</div>
															<div class="menu-item">
																<a class="menu-link" href="../../demo7/dist/apps/file-manager/settings.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Settings</span>
																</a>
															</div>
														</div>
													</div>
													<div class="menu-item">
														<div class="menu-content pt-8 pb-0">
															<span class="menu-section text-muted text-uppercase fs-8 ls-1">Layout</span>
														</div>
													</div>
													<div class="menu-item">
														<a class="menu-link" href="https://preview.keenthemes.com/metronic8/demo7/layout-builder.html" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
																		<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">Layout Builder</span>
														</a>
													</div>
													<div class="menu-item">
														<div class="menu-content">
															<div class="separator mx-1 my-4"></div>
														</div>
													</div>
													<div class="menu-item">
														<a class="menu-link" href="../../demo7/dist/documentation/getting-started/changelog.html">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/coding/cod003.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z" fill="black" />
																		<path opacity="0.3" d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
														
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="flex-column-auto pt-10 px-5" id="kt_aside_secondary_footer">
										
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						<!--begin::Container-->
						<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
							<!--begin::Page title-->
					
							<!--end::Page title=-->
							<!--begin::Wrapper-->
							<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
								<!--begin::Aside mobile toggle-->
								<div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
									<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
									<!--dont remove-->
									<span class="svg-icon svg-icon-2x">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
								<!--end::Aside mobile toggle-->
								<!--begin::Logo-->
								<a href="../../demo7/dist/index.html" class="d-flex align-items-center">
									<img alt="Logo" src="assets/media/logos/logo-demo7.svg" class="h-30px" />
								</a>
								<!--end::Logo-->
							</div>
					
						
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						
						
						    <main class="mainer">
								@yield('content')
							</main>
						
						
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						Footer
					</div>
					<!--end::Footer-->
				</div>

			</div>

		</div>
		<!--end::Root-->
		<!--begin::Drawers-->
		<!--begin::Activities drawer-->
	<div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close"></div>
		<!--end::Activities drawer-->
		<!--begin::Chat drawer-->
		<!--end::Chat drawer-->
        <!--begin::Exolore drawer toggle-->
<button id="kt_explore_toggle" class="explore-toggle btn btn-sm bg-body btn-color-gray-700 btn-active-primary shadow-sm position-fixed px-5 fw-bolder zindex-2 top-50 mt-10 end-0 transform-90 fs-6 rounded-top-0" title="Explore Metronic" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
			<span id="kt_explore_toggle_label">Explore</span>
	</button>
		<!--end::Exolore drawer toggle-->
		<!--begin::Exolore drawer-->
		<div id="kt_explore" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="explore" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'350px', 'lg': '475px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_explore_toggle" data-kt-drawer-close="#kt_explore_close">
			<!--begin::Card-->
			
			<!--end::Card-->
		</div>

		
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>

	
		<div style = 'width:100%;diplay:inline-block;'>
			Footer
		</div> 
    </div>

	
	
	@include ('layouts.script')
	@yield('scripts')
	
</body>
</html>
