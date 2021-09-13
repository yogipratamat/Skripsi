<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>

    @include('layouts.partials._assets')

    @yield('asset')

</head>

<body class="navbar-top">
	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark fixed-top">
		<div class="navbar-brand">
			<a href="{{ route('home') }}" class="d-inline-block">
				<img src="/global_assets/images/logob.png"  alt="">
			</a>
		</div>
		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navbar-mobile">
		    <ul class="navbar-nav">
				<li class="nav-item">
					<a href="" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>
            <span class="ml-md-3 mr-md-auto">Hallo, Selamat Datang {{ \Str::ucfirst(auth()->user()->name) }}</span>
			<ul class="navbar-nav">

                @role('petani')
				<li class="nav-item">
					<a href="{{ route('petani.cart.index') }}" class="navbar-nav-link dropdown-toggle caret-0" >
						<i class="icon-cart5"></i>
                        <span class="d-md-none ml-2">Keranjang</span> <span class="badge text-small badge-success">{{ cartCount() }}</span>
					</a>
				</li>
                @endrole

				<li class="nav-item dropdown">
					<a href="{{ url('logout') }}" class="navbar-nav-link dropdown-toggle caret-0" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						<i class="icon-switch2"></i>
						<span class="d-md-none ml-2">Logout</span>
						<form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
	<!-- Page content -->
	<div class="page-content">
		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">
			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->
			<!-- Sidebar content -->
			<div class="sidebar-content">
				<!-- Main navigation -->
                @include('layouts.partials._sidebar')
				<!-- /main navigation -->
			</div>
			<!-- /sidebar content -->
		</div>
		<!-- /main sidebar -->
		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Page header -->
			<div class="page-header page-header-light">
				@yield('breadcum')
			</div>
			<!-- /page header -->
			<!-- Content area -->
			    @yield('content')
			<!-- /content area -->
			<!-- Footer -->
                @include('layouts.partials._footer')
			<!-- /footer -->
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
    @yield('script')
</body>
</html>
