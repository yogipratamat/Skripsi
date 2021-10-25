@extends('layouts.master')

@section('title', 'Dashboard')

@section('asset')
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
                            <h1 class="font-weight-semibold mb-0" style="font-size: 40pt">{{ $groupFarmCount }}</h1>
                        </div>
                        <div>
                            <h3>Jumlah Kelompok Tani</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-pink-400">
                    <div class="card-body">
                        <div class="d-flex">
                            <h1 class="font-weight-semibold mb-0" style="font-size: 40pt">{{ $farmerCount }}</h1>
                        </div>
                        <div>
                            <h3>Jumlah Seluruh Petani</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-blue-400">
                    <div class="card-body">
                        <div class="d-flex">
                            <h3 class="font-weight-semibold mb-0" style="font-size: 40pt">{{ $productCount }}</h3>
                        </div>
                        <div>
                            <h3>Jumlah Produk Pestisida</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <table class="table text-nowrap table-customers">

                <thead>
                    <div class="text-center bg-dark p-1">
                        <h3 class="mt-1">Pesanan Baru</h3>
                    </div>
                    <tr>
                        <th>No</th>
                        <th>Nama Petani</th>
                        <th>Status Pesanan</th>
                        <th>Tanggal Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{{ $order->farmer->name }}</td>
                            <td>
                                @if ($order->status == 0)

                                    <span class="badge badge-warning">
                                        Dipesan
                                    </span>

                                @elseif($order->status == 1)
                                    <span class="badge badge-primary">
                                        Diterima
                                    </span>
                                @else
                                    <span class="badge badge-success">
                                        Diambil
                                    </span>
                                @endif
                            </td>
                            <td>{{ idFormat($order->date) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
