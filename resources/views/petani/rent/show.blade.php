@extends('layouts.master')

@section('title', 'Detail Pesanan Alat')

@section('asset')

    <!-- Theme JS files -->
    <script src="/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="/global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
    <script src="/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
    <script src="/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
    <script src="/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>

    <script src="/assets/js/app.js"></script>
    <script src="/global_assets/js/demo_pages/ecommerce_orders_history.js"></script>
    <!-- /theme JS files -->


@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route('petani.rent.index') }}" class="breadcrumb-item">Pesanan Alat</a>
                <span class="breadcrumb-item active">Detail Pesanan Alat</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content">
        @if (Session::has('success'))
            <div class="alert alert-success border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="font-weight-semibold">{{ Session('success') }} </span>
            </div>
        @endif
        <div style="border-radius: 1rem" class="card shadow">
            <div style="border-top-left-radius: 1rem; border-top-right-radius: 1rem"
                class="card-header bg-dark header-elements-inline justify-content-center">
                <h5 class="card-title"><b>Detail Pesanan Alat</b></h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <td>Tanggal</td>
                        <td> : {{ idFormat($rent->date) }}</td>
                    </tr>
                    <tr>
                        <td>Nama Petani</td>
                        <td> : {{ $rent->farmer->name }}</td>
                    </tr>
                    <tr>
                        <td>Nama Alat</td>
                        <td> : {{ $rent->tool->name }}</td>
                    </tr>
                    <tr>
                        <td>Luas Lahan</td>
                        <td> : {{ $rent->land_area }} are</td>
                    </tr>
                    <tr>
                        <td>Harga/are</td>
                        <td> : {{ price($rent->tool->price) }}</td>
                    </tr>
                    <tr>
                        <td>Total Harga</td>
                        <td> : {{ price($rent->tool->price * $rent->land_area) }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            :
                            @if ($rent->status == 0)

                                <span class="badge badge-primary">
                                    Dipesan
                                </span>

                            @elseif ($rent->status == 1)
                                <span class="badge badge-success">
                                    Diselesaikan
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    Dibatalkan
                                </span>
                            @endif
                        </td>
                    </tr>
                    @if ($rent->status == 2)
                        <tr>
                            <td>Keterangan</td>
                            <td>
                                : Terjadi Kerusakan / Lain Hal
                            </td>
                        </tr>
                    @endif

                </thead>
            </table>
        </div>
    </div>
@endsection
