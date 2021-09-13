@extends('layouts.master')

@section('title', 'Tambah Subsidi')

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
            <a href="{{ route('admin.subsidy.index') }}" class="breadcrumb-item">Subsidi</a>
            <span class="breadcrumb-item active">Tambah Subsidi</span>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="content">
       <form action="{{ route('admin.subsidy.store') }}" method="POST">
        @csrf
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Tambah Subsidi</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Periode:</label>
                        <input type="text" name="periode" class="form-control" required oninvalid="this.setCustomValidity('Masukan Periode !')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Subsidi</label>
                        <div>
                            <select class="form-control" name="type" required oninvalid="this.setCustomValidity('Masukan Subsidi !')" oninput="setCustomValidity('')">
                                <option value="1">Pupuk</option>
                                <option value="2">Benih</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" name="name" class="form-control" required oninvalid="this.setCustomValidity('Masukan Nama !')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Berat (Kg):</label>
                        <input type="number" name="qty" class="form-control" required oninvalid="this.setCustomValidity('Masukan Berat !')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Harga/Kg:</label>
                        <input type="number" name="price" class="form-control" required oninvalid="this.setCustomValidity('Masukan Harga !')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Batas Pengambilan:</label>
                        <input type="date" name="date" class="form-control" required oninvalid="this.setCustomValidity('Masukan Batas Pengambilan !')" oninput="setCustomValidity('')">
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-warning" href="{{ route('admin.subsidy.index') }}">Cancel</a>
                        <button type="submit" class="btn bg-blue">Submit <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </div>
            </div>
       </form>
    </div>
@endsection
