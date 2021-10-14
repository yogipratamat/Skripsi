@extends('layouts.master')

@section('title', 'Keranjang')

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
                <span class="breadcrumb-item active">Keranjang</span>
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
        <div style="border-radius:1rem" class="card shadow">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card-header bg-transparent header-elements-inline justify-content-center">
                        <h2 class="card-title"><b>Keranjang Pesanan</b></h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th colspan="2">Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga Stuan</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-active">
                                    <td colspan="7" class="font-weight-semibold">{{ $total }} items</td>
                                    <td class="text-right">
                                        <span class="badge bg-secondary badge-pill">{{ $total }} items</span>
                                    </td>
                                </tr>
                                @if ($carts)
                                    @forelse ($carts as $cart)
                                        <tr>
                                            <td class="pr-0" style="width: 45px;">
                                                <a href="#">
                                                    <img src="{{ asset('/storage' . $cart['image']) }}" height="60"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="font-weight-semibold">{{ $cart['name'] }}</a>
                                            </td>
                                            <td>{{ $cart['qty'] }}</td>
                                            <td>Rp. {{ number_format($cart['price'], 2, ',', '.') }}</td>
                                            <td>
                                                Rp.{{ number_format($cart['price'] * $cart['qty'], 2, ',', '.') }}
                                                <a href="{{ route('petani.cart.deleteFromCart', [$cart['id']]) }}"><span
                                                        class="close">&#10005;</span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <div class="text-center mt-5 mb-3">
                                        <h6><b>Data Kosong</b></h6>
                                    </div>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="border-top-right-radius: 1rem" class="col-sm-4 bg-grey-300">
                    <div class="card-header mt-2 bg-transparent header-elements-inline justify-content-center">
                        <h5 class="card-title"><b>Sumary</b></h5>
                    </div>
                    <table class="table text-nowrap">
                        <tr>
                            <th>ITEMS </th>
                            <th>{{ $total }}</th>
                        </tr>
                        <tr>
                            <th>Total Harga </th>
                            <th>Rp. {{ number_format($totalPrice, 2, ',', '.') }}</th>
                        </tr>
                        <tr class="col text-center">
                            <th colspan="2">
                                <a class="btn btn-dark mt-4 pl-3 pr-3"
                                    href="{{ route('petani.cart.checkout') }}">CHECKOUT</a>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
