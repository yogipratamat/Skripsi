@extends('layouts.master')

@section('title', 'Detail Pesanan Produk')

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
                <a href="{{ route('petani.order.index') }}" class="breadcrumb-item"></i> Pesanan Produk</a>
                <span class="breadcrumb-item active">Detail Pesanan Produk</span>
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
                <h6 class="card-title"><b>Detail Pesanan Pestisida</b></h6>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <td>Tanggal</td>
                        <td> : {{ idFormat($order->date) }}</td>
                    </tr>
                    <tr>
                        <td>Nama Petani</td>
                        <td> : {{ $order->farmer->name }}</td>
                    </tr>
                    <tr>
                        <td>Total Harga</td>
                        <td> : {{ price($order->price) }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            :
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
                    </tr>

                </thead>
            </table>
        </div>
        <div style="border-radius: 1rem" class="card shadow">
            <div style="border-top-left-radius: 1rem; border-top-right-radius: 1rem"
                class="card-header bg-dark header-elements-inline justify-content-center">
                <h6 class="card-title"><b>Detail Pestisida</b></h6>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga Satuan</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->qty }}</td>
                                <td>{{ price($product->pivot->price) }}</td>
                                <td>{{ price($product->pivot->total_price) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-right"><b>Total di bayar</b></td>
                            <td><b>: {{ price($total) }}</b></td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
