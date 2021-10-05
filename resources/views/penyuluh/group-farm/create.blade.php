@extends('layouts.master')

@section('title', 'Tambah Kelompok Tani')

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
                <a href="{{ route('penyuluh.group-farm.index') }}" class="breadcrumb-item">Kelompok Tani</a>
                <span class="breadcrumb-item active">Tambah Data</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('penyuluh.group-farm.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Tambah Kelompok Tani</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Kelompok Tani:</label>
                                <input type="text" name="group_name" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan Nama Kelompok Tani!')"
                                    oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>No HP:</label>
                                <input type="text" name="group_phone" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan No HP!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Visi:</label>
                                <input type="text" name="vision" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan Visi!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Misi:</label>
                                <input type="text" name="mission" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan Misi!')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Tambah Admin Kelompok Tani</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Ketua Kelompok Tani:</label>
                                <input type="text" name="name" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan Nama Ketua!')"
                                    oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>E-Mail:</label>
                                <input type="email" name="email" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan Email!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" name="password" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan Password!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>No HP:</label>
                                <input type="text" name="phone" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan No HP!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Alamat:</label>
                                <input type="text" name="address" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan Alamat!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Luas Lahan (are):</label>
                                <input type="number" name="land_area" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan Luas Lahan!')"
                                    oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label class="d-block">Jenis Kelamin</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" class="custom-control-input" name="gender"
                                        id="custom_radio_inline_unchecked" checked>
                                    <label class="custom-control-label"
                                        for="custom_radio_inline_unchecked">Laki-Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" class="custom-control-input" name="gender"
                                        id="custom_radio_inline_checked">
                                    <label class="custom-control-label" for="custom_radio_inline_checked">Perempuan</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-warning" href="{{ route('penyuluh.group-farm.index') }}">Cancel</a>
                                <button type="submit" class="btn bg-blue">Submit <i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
