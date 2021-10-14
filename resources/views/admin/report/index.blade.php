@extends('layouts.master')

@section('title', 'Laporan Penyewaan Alat')

@section('asset')

    <script src="/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>

    <script src="/assets/js/app.js"></script>
@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Laporan Sewa Alat</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content">
        @if (Session::has('penyuluh'))
            <div class="alert alert-success border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="font-weight-semibold">{{ Session('penyuluh') }} </span>
            </div>
        @endif
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Laporan Penyewaan Alat</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                    </div>
                </div>
            </div>
            <div class="pt-2 pl-3">
                <form action="{{ route('admin.report.index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tanggal Awal</label>
                                <input class="form-control" type="date" name="startDate" value="{{ $monthStartDate }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tanggal Akhir</label>
                                <input class="form-control" type="date" name="endDate" value="{{ $monthEndDate }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Kelompok Tani</label>
                            <div>
                                <select class="form-control" name="farmer">
                                    <option value="">Pilih Petani</option>
                                    @foreach ($farmers as $farmer)
                                        <option {{ $farmer->id_farmer == $farmerActive ? 'selected' : '' }}
                                            value="{{ $farmer->id_farmer }}">{{ $farmer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 pt-4">
                            <button type="submit" class="btn btn-primary">
                                Filter
                            </button>
                            <button type="submit" name="cetak" class="btn btn-primary">
                                <i class="icon-printer2"></i> Cetak PDF
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table text-nowrap table-customers">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Nama Alat</th>
                        <th>Tanggal Pesanan</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rents as $rent)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{{ $rent->farmer->name }}</td>
                            <td>{{ $rent->tool->name }}</td>
                            <td>{{ idFormat($rent->date) }}</td>
                            <td>{{ price($rent->tool->price * $rent->land_area) }}</td>
                        </tr>
                    @endforeach
                    <tr class="bg-secondary text-white">
                        <td class="text-right" colspan="4">Total Penyewaan</td>
                        <td>{{ price($total) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
