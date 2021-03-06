@extends('layouts.master')

@section('title', 'Subsidi Pemerintah')

@section('asset')
    <!-- Theme JS files -->
    <script src="/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>

    <script src="/assets/js/app.js"></script>
    <script src="/global_assets/js/demo_pages/datatables_basic.js"></script>
    <!-- /theme JS files -->
@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Subsidi</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Subsidi Pemerintah</h5>

                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                    </div>
                </div>
            </div>

            <table class="table datatable-basic table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Periode</th>
                        <th>Subsidy</th>
                        <th>Nama</th>
                        <th>Batas Awal <br> Pengambilan</th>
                        <th>Batas Akhir<br> Pengambilan</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subsidies as $subsidy)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{{ $subsidy->periode }}</td>
                            <td>{{ $subsidy->type == 1 ? 'Pupuk' : 'Benih' }}</td>
                            <td>{{ $subsidy->name }}</td>
                            <td>{{ idFormat($subsidy->created_at) }}</td>
                            <td>{{ idFormat($subsidy->date) }}</td>
                            <td class="text-center">
                                <a class="btn btn-outline-primary" href="{{ route('petani.subsidy.show', [$subsidy]) }}">
                                    <i class="icon-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
