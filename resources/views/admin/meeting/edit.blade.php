@extends('layouts.master')

@section('title', 'Edit Jadwal Rapat')

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
            <a href="{{ route('admin.meeting.index') }}" class="breadcrumb-item">Jadwal Rapat</a>
            <span class="breadcrumb-item active">Edit Jadwal Rapat</span>
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
                        <h5 class="card-title">Edit Jadwal Rapat</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.meeting.update', [$agenda->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Periode Jadwal:</label>
                                <input type="text" name="periode" value="{{ $agenda->periode }}" class="form-control" required oninvalid="this.setCustomValidity('Masukan Periode!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Type Jadwal</label>
                                <div>
                                    <select class="form-control" value="{{ $agenda->type }}" name="type" required oninvalid="this.setCustomValidity('Masukan Type Jadwal!')" oninput="setCustomValidity('')">
                                        <option value="1">Jadwal Tanam</option>
                                        <option value="2">Jadwal Rapat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal:</label>
                                <input type="date" name="start_date" value="{{ $agenda->start_date }}" class="form-control" required oninvalid="this.setCustomValidity('Masukan Tanggal!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Waktu:</label>
                                <input type="time" name="time" value="{{ $agenda->time }}" class="form-control" required oninvalid="this.setCustomValidity('Masukan Waktu!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Tempat:</label>
                                <input type="text" name="place" value="{{ $agenda->place }}" class="form-control" required oninvalid="this.setCustomValidity('Masukan Tempat!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi:</label>
                                <textarea name="description" id="" class="form-control" required oninvalid="this.setCustomValidity('Masukan Deskripsi!')" oninput="setCustomValidity('')">{{ $agenda->description }}</textarea>
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
