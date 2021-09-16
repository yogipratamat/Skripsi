@extends('layouts.master')

@section('title', 'Dashboard')

@section('asset')
    <!-- Theme JS files -->
    <!-- Theme JS files -->
	<script src="/global_assets/js/plugins/media/fancybox.min.js"></script>

	<script src="/assets/js/app.js"></script>
	<script src="/global_assets/js/demo_pages/gallery.js"></script>
	<!-- /theme JS files -->
	<!-- /theme JS files -->
@endsection

@section('breadcum')
<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </div>
        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
    </div>
</div>
@endsection

@section('content')

<!-- Content area -->
<div class="content">
        <div class="row">
			<div class="content">
				<div class="mb-3 text-center">
					<h1 class="mb-0 font-weight-semibold">
						{{ $farmer->groupFarm->name }}
					</h1>
				</div>

				<div class="row">
					<div class="col-sm-12 col-xl-12">
						<div class="card">
							<div class="card-img-actions mx-1 mt-1">
								<img style="height: 400px;" class="card-img img-fluid" src="../../../../global_assets/images/placeholders/placeholder.jpg" alt="">
							</div>

							<div class="card-body">

                                <div class="mb-4">
                                    <h4 class="font-weight-semibold mr-2">Visi:</h4>
                                    <span>
                                        {{ $farmer->groupFarm->vision }} </span>
                                </div>

                                <div>
                                    <h4 class="font-weight-semibold mr-2">Visi:</h4>
                                    <span>
                                        {{ $farmer->groupFarm->mission }}
                                    </span>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
@endsection
