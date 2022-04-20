

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

		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<div id="kt_aside" class="aside aside-extended" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
					<div class="aside-secondary d-flex flex-row-fluid">
						<!--begin::Workspace-->
						<div class="aside-workspace my-5 pl-3" id="kt_aside_wordspace">
							<div class="d-flex h-100 flex-column">
								<!--begin::Wrapper-->
								<div class="flex-column-fluid hover-scroll-y" data-kt-scroll="true" data-kt-scroll-activate="true" 
								data-kt-scroll-height="auto" 
								data-kt-scroll-wrappers="#kt_aside_wordspace" data-kt-scroll-dependencies="#kt_aside_secondary_footer" data-kt-scroll-offset="0px">
									<!--begin::Tab content-->
									<div class="tab-content">
						
										<div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10" id="kt_aside_logo">
											<a href="/appmerchant">
												<img alt="Logo" src="{{ url('assets/media/logos/logo-demo7.svg') }}" class="h-35px" />
											</a>
										</div>

										<div class="" id="kt_aside_nav_tab_menu" >
											<!--begin::Menu-->
											<div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary 
											menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 px-6 my-5 my-lg-0" id="kt_aside_menu"
											 data-kt-menu="true">
												<div id="kt_aside_menu_wrapper" class="menu-fit">
										
													<div class="menu-item">
									

															<b> Welcome {{ Auth::user()->name }} </b>
                               
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
	
		<span class="menu-icon">

			<span class="svg-icon svg-icon-2">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black" />
					<path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z" fill="black" />
				</svg>
			</span>
		</span>
	
	

		<span class="menu-title">Account  </span>
		<span class="menu-arrow"></span>
	</span>
	<div class="menu-sub menu-sub-accordion">
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
		
		
		

			
				<div class="menu-item">
					<span class="menu-link">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">
							<a  class="menu-link"  href="/appmerchant/edituser" role="button" aria-expanded="false" v-pre>
								<span class="menu-title">{{ Auth::user()->name }}  </span>
							</a>
						</span>
						<span class="menu-arrow"></span>
					</span>
				</div>
				<div class="menu-item">
				
					<span class="menu-link">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
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
						<span class="menu-arrow"></span>
					</span>
				</div>
				
				
				
			</div>
		</div>

	
</div>	
	

	<?php
		$rolesessx = Session::get('fullrole1');
		$rolesess =json_decode(json_encode($rolesessx),true);
		
		//var_dump($rolesessx);
		//echo " <br><hr><br> ";
		//var_dump($rolesess);
		
		$viewcomp = 0;
		$addcomp = 0;	
		$viewsubcomp = 0;
		$addsubcomp = 0;	
		$viewsubsubcomp = 0;
		$addsubsubcomp = 0;	
		
		
		
		$addbranch = 0;
		$viewbranch = 0;
		
		
		$addcat = 0;
		$viewcat = 0;
		$addsubcat = 0;
		$viewsubcat = 0;
		$addsubsubcat = 0;
		$viewsubsubcat = 0;
		$addprod = 0;
		$viewprod = 0;	
		$addprodbycat = 0;
		$viewprodbycat = 0;
		
		
		
		$i= 0;
		foreach($rolesessx as $rolex1)
		{
			$maner1= '';
			$maner = $rolex1;
			$menux = $rolex1['menux'];
			$menuname = $rolex1['menuname'];
			$menuurlx = $rolex1['urlx'];
			
			
			if($menux != '' && $menux == 'yes' && $menuname != '' && $menuname != null )
			{
				$maner1 .= "$menuname $menux <br> $menuurlx<br> <hr>";
				if($menuurlx == '/appmerchant/viewcompany' || $menuurlx == '/appmerchant/viewcompany/'
				|| $menuurlx == 'appmerchant/viewcompany/')
				{
					$viewcomp = 1;	
				}
				
				if($menuurlx == '/appmerchant/addcompany' || $menuurlx == '/appmerchant/addcompany/'
				|| $menuurlx == 'appmerchant/addcompany/')
				{
					$addcomp = 1;	
				}
				
				
				if($menuurlx == '/appmerchant/viewsubcompany' || $menuurlx == '/appmerchant/viewsubcompany/'
				|| $menuurlx == 'appmerchant/viewsubcompany/')
				{
					$viewsubcomp = 1;	
				}
				
				if($menuurlx == '/appmerchant/addsubcompany' || $menuurlx == '/appmerchant/addsubcompany/'
				|| $menuurlx == 'appmerchant/addsubcompany/')
				{
					$addsubcomp = 1;	
				}
				
				
				if($menuurlx == '/appmerchant/viewsubsubcompany' 
				|| $menuurlx == '/appmerchant/viewsubsubcompany/'
				|| $menuurlx == 'appmerchant/viewsubsubcompany/')
				{
					$viewsubsubcomp = 1;	
				}
				
				if($menuurlx == '/appmerchant/addsubsubcompany' 
				|| $menuurlx == '/appmerchant/addsubsubcompany/'
				|| $menuurlx == 'appmerchant/addsubsubcompany/')
				{
					$addsubsubcomp = 1;	
				}
				
				
				
				
				
				if($menuurlx == '/appmerchant/addcat' || $menuurlx == '/appmerchant/addcat/'
				|| $menuurlx == 'appmerchant/addcat/')
				{
					$addcat = 1;	
				}
				
				if($menuurlx == '/appmerchant/viewcat' || $menuurlx == '/appmerchant/viewcat/'
				|| $menuurlx == 'appmerchant/viewcat/')
				{
					$viewcat = 1;	
				}
				
				if($menuurlx == '/appmerchant/addsubcat' || $menuurlx == '/appmerchant/addsubcat/'
				|| $menuurlx == 'appmerchant/addsubcat/')
				{
					$addsubcat = 1;	
				}
				
				if($menuurlx == '/appmerchant/viewsubcat' || $menuurlx == '/appmerchant/viewsubcat/'
				|| $menuurlx == 'appmerchant/viewsubcat/')
				{
					$viewsubcat = 1;	
				}
				
				
				if($menuurlx == '/appmerchant/addsubsubcat' || $menuurlx == '/appmerchant/addsubsubcat/'
				|| $menuurlx == 'appmerchant/addsubsubcat/')
				{
					$addsubsubcat = 1;	
				}
				
				if($menuurlx == '/appmerchant/viewsubsubcat' || $menuurlx == '/appmerchant/viewsubsubcat/'
				|| $menuurlx == 'appmerchant/viewsubsubcat/')
				{
					$viewsubsubcat = 1;	
				}
				
				
				if($menuurlx == '/appmerchant/addprod' || $menuurlx == '/appmerchant/addprod/'
				|| $menuurlx == 'appmerchant/addprod/')
				{
					$addprod = 1;	
				}
				
				if($menuurlx == '/appmerchant/viewprod' || $menuurlx == '/appmerchant/viewprod/'
				|| $menuurlx == 'appmerchant/viewprod/')
				{
					$viewprod = 1;	
				}
				
				
				if($menuurlx == '/appmerchant/addprodbycat' || $menuurlx == '/appmerchant/addprodbycat/'
				|| $menuurlx == 'appmerchant/addprodbycat/')
				{
					$addprodbycat = 1;	
				}
				
				if($menuurlx == '/appmerchant/viewprodbycat' || $menuurlx == '/appmerchant/viewprodbycat/'
				|| $menuurlx == 'appmerchant/viewprodbycat/')
				{
					$viewprodbycat = 1;	
				}
				
				
				if($menuurlx == '/appmerchant/addbranch' || $menuurlx == '/appmerchant/addbranch/'
				|| $menuurlx == 'appmerchant/addbranch/')
				{
					$addbranch = 1;	
				}
				
				if($menuurlx == '/appmerchant/viewbranch' || $menuurlx == '/appmerchant/viewbranch/'
				|| $menuurlx == 'appmerchant/viewbranch/')
				{
					$viewbranch = 1;	
				}
				
				
			}
			/*
			foreach($rolex1['menuname'] as $rolex1menunamex)
			{
				$maner .= "Menuname $rolex1menunamex";
			}
			foreach($rolex1['menu'] as $rolex1menux)
			{
				$maner .= "Menu $rolex1menux <br><hr>";
			}
			*/
			//echo "$maner1";
		}
		

	?>	

	
	
	
	
<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
		
	


	<span class="menu-link">
			<span class="menu-icon">
				<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
				<span class="svg-icon svg-icon-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
						<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
					</svg>
				</span>
				<!--end::Svg Icon-->
			</span>
			<span class="menu-title">Customers</span>
			<span class="menu-arrow"></span>
		</span>
	</span>
	
	<div class="menu-sub menu-sub-accordion">
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Companies</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
			
				<?php
				if($viewcomp ==1)
				{	
				?>
				<div class="menu-item">
					<a class="menu-link" 
					href="/appmerchant/viewcompany/">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">View Companies</span>
					</a>
				</div>
				
				<?php
				}
				?>
				<?php
				if($addcomp ==1)
				{	
				?>
				<div class="menu-item">
					<a class="menu-link" href="/appmerchant/addcompany">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">Add Companies</span>
					</a>
				</div>
				<?php
				}
				?>
				
				
				
			</div>
		</div>

	
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Sub Companies</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
			
				<?php
				if($viewsubcomp ==1)
				{	
				?>
			
			
				<div class="menu-item">
					<a class="menu-link" 
					href="/appmerchant/viewsubcompany/">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">View Sub Companies</span>
					</a>
				</div>
				
				<?php
				}
				?>
				
				<?php
				if($addsubcomp ==1)
				{	
				?>
				
				<div class="menu-item">
					<a class="menu-link" href="/appmerchant/addsubcompany">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">Add Sub Companies</span>
					</a>
				</div>
				<?php
				}
				?>
				
			</div>
		</div>

		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Sub Sub Companies</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
			
				<?php
				if($viewsubsubcomp ==1)
				{	
				?>
			
				<div class="menu-item">
					<a class="menu-link" 
					href="/appmerchant/viewsubsubcompany/">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">View Sub Sub Companies</span>
					</a>
				</div>
				
				<?php
				}
					
				?>
				
				<?php
				if($addsubsubcomp ==1)
				{	
				?>
				
				<div class="menu-item">
					<a class="menu-link" href="/appmerchant/addsubsubcompany">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">Add Sub Sub Companies</span>
					</a>
				</div>
				
				<?php
				}
				?>
			</div>
		</div>
		
		
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Products</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
			
				<?php
				if($viewprod ==1)
				{	
				?>
			
			
				<div class="menu-item">
					<a class="menu-link" 
					href="/appmerchant/viewprod/">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">View Products</span>
					</a>
				</div>
				
				
				<?php
				}
				?>
				
				
				<?php
				if($addprod ==1)
				{	
				?>
				<div class="menu-item">
					<a class="menu-link" href="/appmerchant/addprod">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">Add Products</span>
					</a>
				</div>
				<?php
				}
				?>
			</div>
		</div>

	</div>		
</div>






<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
		
	


	<span class="menu-link">
			<span class="menu-icon">
				<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
				<span class="svg-icon svg-icon-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
						<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
					</svg>
				</span>
				<!--end::Svg Icon-->
			</span>
			<span class="menu-title">Shop</span>
			<span class="menu-arrow"></span>
		</span>
	</span>
	
	<div class="menu-sub menu-sub-accordion">
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Categories</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
			
				<?php
				if($viewcat ==1)
				{	
				?>
			
			
				<div class="menu-item">
					<a class="menu-link" 
					href="/appmerchant/viewcat/">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">View Categories</span>
					</a>
				</div>
				<?php
				}
				?>
				<?php
				if($addcat ==1)
				{	
				?>
				
				
				<div class="menu-item">
					<a class="menu-link" href="/appmerchant/addcat">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">Add Category</span>
					</a>
				</div>
				
				<?php
				}
				?>
				
				
			</div>
		</div>

	
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Sub Categories</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
			
				<?php
				if($viewsubcat ==1)
				{	
				?>
				<div class="menu-item">
					<a class="menu-link" 
					href="/appmerchant/viewsubcat/">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">View Sub Categories</span>
					</a>
				</div>
				<?php
				}
				?>
				
				<?php
				if($addsubcat ==1)
				{	
				?>
				
				<div class="menu-item">
					<a class="menu-link" href="/appmerchant/addsubcat">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">Add Sub Categories</span>
					</a>
				</div>
				<?php
				}
				?>
				
				
				
			</div>
		</div>

		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Sub Sub Categories</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
			
				<?php
				if($viewsubsubcat ==1)
				{	
				?>
			
				<div class="menu-item">
					<a class="menu-link" 
					href="/appmerchant/viewsubsubcat/">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">View Sub Sub Categories</span>
					</a>
				</div>
				<?php
				}
				?>
				
				<?php
				if($viewsubsubcat ==1)
				{	
				?>
				<div class="menu-item">
					<a class="menu-link" href="/appmerchant/addsubsubcat">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">Add Sub Sub Categories</span>
					</a>
				</div>
				<?php
				}
				?>
				
				
				
			</div>
		</div>
		
		
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-bullet">
					<span class="bullet bullet-dot"></span>
				</span>
				<span class="menu-title">Products</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
			
				<?php
				if($viewprodbycat ==1)
				{	
				?>
			
				<div class="menu-item">
					<a class="menu-link" 
					href="/appmerchant/viewprodbycat/">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">View Products</span>
					</a>
				</div>
				
				<?php
				}
				?>
				
				<?php
				if($addprodbycat ==1)
				{	
				?>
				
				<div class="menu-item">
					<a class="menu-link" href="/appmerchant/addprodbycat">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">Add Products</span>
					</a>
				</div>
				
				
				<?php
				}
				?>
				
				
				
			</div>
		</div>

	</div>		
</div>













<div data-kt-menu-trigger="click" class="menu-item menu-accordion">

	<span class="menu-link">
			<span class="menu-icon">
				<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
				<span class="svg-icon svg-icon-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z" fill="black" />
						<path opacity="0.3" d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z" fill="black" />
					</svg>
				</span>
				<!--end::Svg Icon-->
			</span>
			<span class="menu-title">Branches</span>
			<span class="menu-arrow"></span>
		</span>
	</span>




	<div class="menu-sub menu-sub-accordion">
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
				<?php
				if($addbranch ==1)
				{	
				?>
			
				<div class="menu-item">
					<a class="menu-link" href="/appmerchant/addbranch/">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">Add Branch</span>
					</a>
				</div>
				
				<?php
				}
				?>
				
				<?php
				if($viewbranch ==1)
				{	
				?>
				<div class="menu-item">
					<a class="menu-link" href="/appmerchant/viewbranch/">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">View Branches</span>
					</a>
				</div>
				
				<?php
				}
				?>
				
				
			</div>
		</div>

	
</div>
													
													
	

					
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="flex-column-auto pt-10 px-5" id="kt_aside_secondary_footer">
									<button class="btn btn-sm btn-icon bg-body btn-color-gray-700 btn-active-primary position-absolute translate-middle start-100 end-0 bottom-0 shadow-sm d-none d-lg-flex" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize" style="margin-bottom: 1.35rem">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
										<span class="svg-icon svg-icon-2 rotate-180">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black" />
												<path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black" />
											</svg>
										</span>
									</button>									
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<main class="mainer">
							@yield('content')
						</main>
					</div>

					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						
						<img alt="Logo" src="{{ url('img/powered.png') }}"  style = 'width:160px;height:42px;'/>
					</div>
				</div>

			</div>

		</div>

	<div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close"></div>


		
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
