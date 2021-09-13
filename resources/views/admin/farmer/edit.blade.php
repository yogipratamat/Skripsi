@extends('layouts.master')

@section('title', 'Edit Petani')

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
            <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Home</a>
            <a href="{{ route('admin.farmer.index') }}" class="breadcrumb-item">Petani</a>
            <span class="breadcrumb-item active">Edit Petani</span>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="content">
       <form action="{{ route('admin.farmer.update', [$farmer]) }}" method="POST">
        @csrf
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Edit Petani</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" name="name" value="{{ $farmer->name }}" class="form-control" required oninvalid="this.setCustomValidity('Masukan Nama!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>E-Mail:</label>
                        <input type="email" name="email" value="{{ $farmer->email }}" class="form-control" required oninvalid="this.setCustomValidity('Masukan Email!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="password" value="{{ $farmer->password }}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>No HP:</label>
                        <input type="text" name="phone" value="{{ $farmer->phone }}" class="form-control" required oninvalid="this.setCustomValidity('Masukan No HP!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Alamat:</label>
                        <input type="text" name="address" value="{{ $farmer->address }}" class="form-control" required oninvalid="this.setCustomValidity('Masukan Alamat!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Luas Lahan (Are):</label>
                        <input type="number" name="land_area" value="{{ $farmer->land_area }}" class="form-control" required oninvalid="this.setCustomValidity('Masukan Luas Lahan!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Jenis Kelamin</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input {{ $farmer->gender == 1 ? 'checked':'' }} type="radio" value="1" class="custom-control-input" name="gender" id="custom_radio_inline_unchecked">
                            <label class="custom-control-label" for="custom_radio_inline_unchecked">Laki-Laki</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input {{ $farmer->gender == 0 ? 'checked':'' }} type="radio" value="0" class="custom-control-input" name="gender" id="custom_radio_inline_checked">
                            <label class="custom-control-label" for="custom_radio_inline_checked">Perempuan</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-warning" href="{{ route('admin.farmer.index') }}">Cancel</a>
                        <button type="submit" class="btn bg-blue">Submit <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </div>
            </div>
       </form>
    </div>
@endsection
