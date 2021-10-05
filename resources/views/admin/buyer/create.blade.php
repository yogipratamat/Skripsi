@extends('layouts.master')

@section('title', 'Tambah Pembeli Padi')

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
                <a href="{{ route('admin.buyer.index') }}" class="breadcrumb-item">Pembeli Padi</a>
                <span class="breadcrumb-item active">Tambah Pembeli Padi</span>
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
                        <h5 class="card-title">Tambah Pembeli Padi</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.buyer.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Input Gambar:</label>
                                <input type="file" class="form-input-styled" name="image" required
                                    oninvalid="this.setCustomValidity('Masukan Gambar!')" oninput="setCustomValidity('')">
                                <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                            </div>
                            <div class="form-group">
                                <label>Nama Pembeli Padi:</label>
                                <input type="text" name="name" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan nama!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Harga Beli/Kg:</label>
                                <input type="number" name="price" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan Harga!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>No HP:</label>
                                <input type="text" name="phone" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan No HP!')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi:</label>
                                <textarea name="description" id="" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan Deskripsi!')"
                                    oninput="setCustomValidity('')"></textarea>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-warning" href="{{ route('admin.buyer.index') }}">Cancel</a>
                                <button type="submit" class="btn bg-blue">Submit<i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
