@extends('layouts.master')

@section('title', 'Dashboard')

@section('asset')
    <!-- Theme JS files -->
    <script src="{{ asset('/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ asset('/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{ asset('/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/global_assets/js/demo_pages/dashboard.js') }}"></script>
    <script src="{{ asset('/global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js') }}"></script>
    <script src="{{ asset('/global_assets/js/demo_charts/pages/dashboard/light/sparklines.js') }}"></script>
    <script src="{{ asset('/global_assets/js/demo_charts/pages/dashboard/light/lines.js') }}"></script>
    <script src="{{ asset('/global_assets/js/demo_charts/pages/dashboard/light/areas.js') }}"></script>
    <script src="{{ asset('/global_assets/js/demo_charts/pages/dashboard/light/donuts.js') }}"></script>
    <script src="{{ asset('/global_assets/js/demo_charts/pages/dashboard/light/bars.js') }}"></script>
    <script src="{{ asset('/global_assets/js/demo_charts/pages/dashboard/light/progress.js') }}"></script>
    <script src="{{ asset('/global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js') }}"></script>
    <script src="{{ asset('/global_assets/js/demo_charts/pages/dashboard/light/pies.js') }}"></script>
    <script src="{{ asset('/global_assets/js/demo_charts/pages/dashboard/light/bullets.js') }}"></script>
	<!-- /theme JS files -->

    <!-- Theme JS files -->
	<script src="/global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>
	{{-- <script src="/global_assets/js/plugins/tables/datatables/datatables.min.js"></script> --}}
	<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="/global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
	<script src="/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script src="/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>

	<script src="/assets/js/app.js"></script>
	<script src="/global_assets/js/demo_pages/ecommerce_customers.js"></script>
	<script src="/global_assets/js/demo_charts/pages/ecommerce/light/customers.js"></script>
    <script src="/global_assets/js/demo_pages/gallery_library.js"></script>
    <script src="/global_assets/js/plugins/media/fancybox.min.js"></script>
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
		<!-- Dashboard content -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card bg-teal-400">
                    <div class="card-body">
                        <div class="d-flex">
                            <h3 class="font-weight-semibold mb-0">{{ $groupFarmCount }}</h3>
                        </div>
                        <div>
                            Jumlah Kelompok Tani
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-pink-400">
                    <div class="card-body">
                        <div class="d-flex">
                            <h3 class="font-weight-semibold mb-0">{{ $farmerCount }}</h3>
                        </div>
                        <div>
                            Jumlah Seluruh Petani
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-blue-400">
                    <div class="card-body">
                        <div class="d-flex">
                            <h3 class="font-weight-semibold mb-0">{{ $productCount }}</h3>
                        </div>
                        <div>
                            Jumlah Produk
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <table class="table text-nowrap table-customers">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Petani</th>
                        <th>Status</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                        {{-- <th class="text-center"></th> --}}
                        {{-- <th></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{!! $loop->iteration !!}</td>
                        <td>{{ $order->farmer->name }}</td>
                        <td>
                            @if ($order->status == 0 )

                            <span class="badge badge-primary">
                                Dipesan
                            </span>

                            @else
                            <span class="badge badge-success">
                                Diterima
                            </span>
                            @endif
                        </td>
                        <td>{{ price($order->price) }}</td>
                        <td>{{ idFormat($order->date) }}</td>
                        {{-- <td class="text-right">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu7"></i>
                                    </a>
                                </div>
                            </div>
                        </td> --}}
                        {{-- <td class="pl-0"></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</div>
@endsection
