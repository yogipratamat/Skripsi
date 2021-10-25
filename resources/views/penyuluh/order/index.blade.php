@extends('layouts.master')

@section('title', 'Pesanan Produk')

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
    <!-- /theme JS files -->
@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Pesanan Pestisida</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        @if (Session::has('penyuluh'))
            <div class="alert alert-success border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="font-weight-semibold">{{ Session('penyuluh') }} </span>
            </div>
        @endif
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Pesanan Pestisida</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                    </div>
                </div>
            </div>
            <div class="pt-2 pl-3 mb-2">
                <form action="{{ route('penyuluh.order.index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <select class="form-control mt-1" name="groupFarm">
                                    <option value="">Semua Kelompok Tani</option>
                                    @foreach ($groupFarms as $groupFarm)
                                        <option {{ $groupFarm->id_group_farm == $farmerActive ? 'selected' : '' }}
                                            value="{{ $groupFarm->id_group_farm }}">{{ $groupFarm->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary mt-1">
                                Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap table-customers">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Petani</th>
                            <th>Status</th>
                            <th>Total Harga</th>
                            <th class="text-center">Tanggal Pemesanan</th>
                            <th class="text-center">Actions</th>
                            <th></th>
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
                                <td>{{ price($order->price) }}</td>
                                <td class="text-center">{{ idFormat($order->date) }}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary"
                                        href="{{ route('penyuluh.order.show', [$order->id_order]) }}">
                                        <i class="icon-eye"></i> Detail
                                    </a>
                                </td>
                                <td class="pl-0"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /content area -->
@endsection
