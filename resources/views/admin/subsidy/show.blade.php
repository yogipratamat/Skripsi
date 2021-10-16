@extends('layouts.master')

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
                <a href="{{ route('admin.subsidy.index') }}" class="breadcrumb-item">Subsidi Pemerintah</a>
                <span class="breadcrumb-item active">Detail</span>
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
                <h6 class="card-title"><b>Detail Subsidi</b></h6>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <td>Periode</td>
                        <td> : {{ $subsidy->periode }}</td>
                    </tr>
                    <tr>
                        <td>Subsidi</td>
                        <td> : {{ $subsidy->type == 1 ? 'Pupuk' : 'Benih' }}</td>
                    </tr>
                    <tr>
                        <td>Nama {{ $subsidy->type == 1 ? 'Pupuk' : 'Benih' }} </td>
                        <td> : {{ $subsidy->name }}</td>
                    </tr>
                    <tr>
                        <td>Berat </td>
                        <td> : {{ $subsidy->qty }} Kg</td>
                    </tr>
                    <tr>
                        <td>Harga / KG</td>
                        <td> : {{ price($subsidy->price) }}</td>
                    </tr>
                    <tr>
                        <td>Batas Pengambilan</td>
                        <td> : {{ idFormat($subsidy->date) }}</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div style="border-radius: 1rem" class="card shadow">
            <div style="border-top-left-radius: 1rem; border-top-right-radius: 1rem"
                class="card-header bg-dark header-elements-inline justify-content-center">
                <h6 class="card-title"><b>Detail Pembagian Subsudi</b></h6>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>Nama Petani</th>
                            <th>Jumlah Jatah</th>
                            <th>Total Harga</th>
                            <th>Status Pengambilan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subsidy->farmers as $farmer)
                            <tr>
                                <td>{{ $farmer->name }}</td>
                                <td>{{ $farmer->pivot->qty }} Kg</td>
                                <td>{{ price($farmer->pivot->price) }}</td>
                                <td>
                                    @if ($farmer->pivot->status == 0)
                                        <span class="badge badge-primary">
                                            Belum Diambil
                                        </span>
                                    @else
                                        <span class="badge badge-success">
                                            Sudah Diambil
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($farmer->pivot->status == 0)
                                        <a
                                            href="{{ route('admin.subsidy.process', [$subsidy->id_subsidy, $farmer->id_farmer]) }}">
                                            <button class="btn btn-sm btn-primary">
                                                Proses
                                            </button>
                                        </a>
                                    @else
                                        <form
                                            action="{{ route('admin.cetaksubsidy.index', [$subsidy->id_subsidy, $farmer->id_farmer]) }}"
                                            method="GET">
                                            <button type="submit" class="btn btn-sm btn-success" name="cetak"><i
                                                    class="icon-printer2"></i>
                                                Cetak
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
