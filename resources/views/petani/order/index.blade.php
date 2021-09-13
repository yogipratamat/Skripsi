@extends('layouts.master')

@section('title', 'Pesanan Produk')

@section('asset')
	<!-- Theme JS files -->
	<script src="/global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>
	<script src="/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="/global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
	<script src="/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script src="/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>

	<script src="/assets/js/app.js"></script>
	<script src="/global_assets/js/demo_pages/ecommerce_customers.js"></script>
	<script src="/global_assets/js/demo_charts/pages/ecommerce/light/customers.js"></script>
	<!-- /theme JS files -->
@endsection

@section('breadcum')
<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
            <span class="breadcrumb-item active">Pesanan Produk Pestisida</span>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Content area -->
<div class="content">
    <div class="card">
        @if(Session::has('petani'))
        <div class="col-md-6">
            <div class="text-left">
                <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold">{{ Session('petani') }} </span>
                </div>
            </div>
        </div>
        @endif
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Data Pesanan Produk</h5>

            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                </div>
            </div>
        </div>
        <table class="table text-nowrap table-customers">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Petani</th>
                    <th>Status</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Actions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order )
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td>{{ $order->farmer->name }} K</td>
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
                    <td class="text-right">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu7"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="" class="dropdown-item"><i class="icon-eye"></i>Detail</a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="pl-0"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /content area -->
@endsection
