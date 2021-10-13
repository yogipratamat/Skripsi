@extends('layouts.master')

@section('title', 'Edit Produk')

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
                <a href="{{ route('penyuluh.product.index') }}" class="breadcrumb-item">Produk</a>
                <span class="breadcrumb-item active">Edit Produk</span>
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
                        <h5 class="card-title">Edit Produk Pestisida</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('penyuluh.product.update', [$product]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Input Gambar:</label>
                                <input type="file" class="form-input-styled" name="image">
                                <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                            </div>
                            <div class="form-group">
                                <label>Merk Produksi:</label>
                                <input type="text" value="{{ $product->merk }}" name="merk" class="form-control"
                                    required oninvalid="this.setCustomValidity('Masukan Merk !')"
                                    oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Nama Produk:</label>
                                <input type="text" value="{{ $product->name }}" name="name" class="form-control"
                                    required oninvalid="this.setCustomValidity('Masukan Produksi !')"
                                    oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Harga:</label>
                                <input type="number" value="{{ $product->price }}" name="price" class="form-control"
                                    required oninvalid="this.setCustomValidity('Masukan Harga !')"
                                    oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Stock:</label>
                                <input type="number" value="{{ $product->stock }}" name="stock" class="form-control"
                                    required oninvalid="this.setCustomValidity('Masukan Jumlah Stok !')"
                                    oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Deskrispsi:</label>
                                <textarea name="description" value="" id="" class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan Deskripsi !')"
                                    oninput="setCustomValidity('')">{{ $product->description }}"</textarea>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-warning" href="{{ route('penyuluh.product.index') }}">Cancel</a>
                                <button type="submit" class="btn bg-blue">Submit <i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
