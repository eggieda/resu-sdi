<!DOCTYPE html>
<html lang="{{ config('app.locale', 'en') }}">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
	<link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>{{ config('app.name') }} | @yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<!-- CSS Files -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
	<!-- Fontawesome -->
	<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.css') }}">

	<style>
		@media (max-width: 767.98px) {
			.content {
				padding: 15px 0 !important;
			}
		}

		.modal {
			top: -120px !important;
		}
	</style>

	@stack('styles')
</head>

<body>
@stack('modals')
<div class="wrapper">
	<div class="sidebar" data-image="{{ asset('img/background-1.jpg') }}" data-color="{{ auth()->user()->isAdmin() ? 'black' : 'red' }}">
		<!--
			Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

			Tip 2: you can also add an image using data-image tag
		-->
		<div class="sidebar-wrapper">
			<div class="logo">
				<a href="{{ route('home') }}" class="simple-text">
					{{ config('app.name') }}
				</a>
			</div>
			<ul class="nav">
				<li class="nav-item{{ Route::is('home') ? ' active' : '' }}">
					<a class="nav-link" href="{{ route('home') }}">
						<i class="nc-icon nc-app"></i>
						<p>Dashboard</p>
					</a>
				</li>
				@if(auth()->user()->isAdmin())
					<li class="nav-item{{ Route::is('work-order.create') ? ' active' : '' }}">
						<a class="nav-link" href="{{ route('work-order.create') }}">
							<i class="nc-icon nc-paper-2"></i>
							<p>Create Workorder</p>
						</a>
					</li>
				@endif
				<li class="nav-item{{ Route::is('work-order.index') ? ' active' : '' }}">
					<a class="nav-link" href="{{ route('work-order.index') }}">
						<i class="nc-icon nc-bullet-list-67"></i>
						<p>Review Workorders</p>
					</a>
				</li>
				@if(auth()->user()->isAdmin())
					<li class="nav-item{{ Route::is('work-order.closed') ? ' active' : '' }}">
						<a class="nav-link" href="{{ route('work-order.closed') }}">
							<i class="nc-icon nc-notes"></i>
							<p>Closed Workorders</p>
						</a>
					</li>
					<li class="nav-item{{ strpos(request()->url(), 'admin-management') ? ' active' : '' }}">
						<a class="nav-link" href="{{ route('admin-management.index') }}">
							<i class="nc-icon nc-circle-09"></i>
							<p>Admins</p>
						</a>
					</li>
					<li class="nav-item{{ strpos(request()->url(), 'technician-management') ? ' active' : '' }}">
						<a class="nav-link" href="{{ route('technician-management.index') }}">
							<i class="nc-icon nc-circle-09"></i>
							<p>Technicians</p>
						</a>
					</li>
				@endif
			</ul>
		</div>
	</div>
	<div class="main-panel">
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg " color-on-scroll="500">
			<div class=" container-fluid  ">
				<a class="navbar-brand" href="#pablo"> @yield('title') </a>
				<button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar burger-lines"></span>
					<span class="navbar-toggler-bar burger-lines"></span>
					<span class="navbar-toggler-bar burger-lines"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navigation">
					<ul class="nav navbar-nav mr-auto">

					</ul>
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="#pablo" onclick="$('#logout-form').submit();">
								<span class="no-icon">Log out</span>
							</a>
						</li>
						<form action="{{ route('logout') }}" method="post" id="logout-form">@csrf</form>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End Navbar -->
		<div class="content">
			<div class="container-fluid">
				<div class="section">
					@yield('contents')
				</div>
			</div>
		</div>
		<footer class="footer">
			<div class="container">
				<nav>
					<p class="copyright text-center">
						{{ config('resu.copyright') }}
					</p>
				</nav>
			</div>
		</footer>
	</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
<!--  Chartist Plugin  -->
<script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{ asset('js/light-bootstrap-dashboard.js?v=2.0.1') }}" type="text/javascript"></script>

<script>
	@if(session('status'))
		$(document).ready(function () {
			$.notify({
				icon: "nc-icon nc-check-2",
				message: "{{ session('status') }}"
			}, {
				type: 'info',
				timer: 8000,
				placement: {
					from: 'top',
					align: 'right'
				}
			});
		});
	@endif

	@if(session('error'))
		$(document).ready(function () {
			$.notify({
				icon: "nc-icon nc-simple-remove",
				message: "{{ session('error') }}"
			}, {
				type: 'danger',
				timer: 8000,
				placement: {
					from: 'top',
					align: 'right'
				}
			});
		});
	@endif
</script>

</html>