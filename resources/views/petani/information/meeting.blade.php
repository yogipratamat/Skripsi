@extends('layouts.master')

@section('title', 'Jadwal Rapat')

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
    <script src="/global_assets/js/demo_pages/gallery_library.js"></script>
    <script src="/global_assets/js/plugins/media/fancybox.min.js"></script>
    <!-- /theme JS files -->
@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Informasi Jadwal Rapat</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Informasi Jadwal Rapat</h5>
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
                        <th>Nama Rapat</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Tempat</th>
                        <th>Keterangan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meetings as $meeting)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{{ $meeting->name }}</td>
                            <td>{{ idFormat($meeting->date) }}</td>
                            <td>{{ $meeting->time }}</td>
                            <td>{{ $meeting->place }}</td>
                            <td>{{ $meeting->description }}</td>
                            <td class="pl-0"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /content area -->
@endsection
