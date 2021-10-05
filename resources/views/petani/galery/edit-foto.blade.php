@extends('layouts.master')

@section('title', 'Edit Galery Foto')

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
                <a href="{{ route('petani.galery.index') }}" class="breadcrumb-item">Galery</a>
                <span class="breadcrumb-item active">Edit Galery Foto</span>
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
                        <h6 class="card-title">Edit Galery Foto</h6>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('petani.galery.update', [$galeryFoto]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Input Gambar</label>
                                <div>
                                    <div class="custom-file">
                                        <input type="file" value="{{ $galeryFoto->image }}" class="custom-file-input"
                                            id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Judul:</label>
                                <input type="text" value="{{ $galeryFoto->title }}" name="title" class="form-control"
                                    required oninvalid="this.setCustomValidity('Masukan Judul!')"
                                    oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi:</label>
                                <input type="text" value="{{ $galeryFoto->description }}" name="description"
                                    class="form-control" required
                                    oninvalid="this.setCustomValidity('Masukan Deskripsi !')"
                                    oninput="setCustomValidity('')">
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-warning" href="{{ route('petani.galery.index') }}">Cancel</a>
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
