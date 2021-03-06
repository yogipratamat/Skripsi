@extends('layouts.master')

@section('title', 'Tambah Jadwal Menanam')

@section('asset')
<!-- Theme JS files -->
    <script src="/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>

	<script src="/assets/js/app.js"></script>
	<script src="/global_assets/js/demo_pages/form_actions.js"></script>
<!-- /theme JS files -->
@endsection

@section('breadcum')
<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
            <a href="{{ route('admin.plant.index') }}" class="breadcrumb-item">Jadwal Menanam</a>
            <span class="breadcrumb-item active">Tambah Jadwal Menanam</span>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Tambah Jadwal Menanam</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.plant.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Periode Jadwal:</label>
                                <input type="text" name="periode" class="form-control" required oninvalid="this.setCustomValidity('Masukan Periode!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Batas Tgl Awal:</label>
                                <input type="date" name="start_date" class="form-control" required oninvalid="this.setCustomValidity('Masukan Tanggal Awal!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Batas Tgl Akhir:</label>
                                <input type="date" name="end_date" class="form-control" required oninvalid="this.setCustomValidity('Masukan Batas Tanggal Akhir!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi:</label>
                                <textarea name="description" id="" class="form-control" required oninvalid="this.setCustomValidity('Masukan Deskripsi!')" oninput="setCustomValidity('')"></textarea>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-warning" href="{{ route('admin.meeting.index') }}">Cancel</a>
                                <button type="submit" class="btn bg-blue">Submit<i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
