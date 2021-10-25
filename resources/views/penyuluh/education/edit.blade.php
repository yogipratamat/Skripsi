@extends('layouts.master')

@section('title', 'Edit Edukasi & Pengendalian')

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
                <a href="{{ route('penyuluh.education.index') }}" class="breadcrumb-item">Edukasi & Pengendalian</a>
                <span class="breadcrumb-item active">Edit Edukasi & Pengendalian</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content">
        <div class="row">
            {{-- <div class="col-md-1"></div> --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Edit Edukasi & Pengendalian</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('penyuluh.education.update', [$education->id_education]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Input Gambar:</label>
                                <input type="file" class="form-input-styled" name="image">
                                <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                            </div>
                            <div class="form-group">
                                <label>Nama Kendala:</label>
                                <input type="text" name="name" class="form-control" value="{{ $education->name }}"
                                    required oninvalid="this.setCustomValidity('Masukan nama penyakit!')"
                                    oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Ciri-Ciri:</label>
                                <input type="text" name="ciri" class="form-control" value="{{ $education->ciri }}"
                                    required oninvalid="this.setCustomValidity('Masukan Ciri-Ciri!')"
                                    oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Solusi:</label>
                                <textarea name="solution" id="" class="form-control" value="{{ $education->solution }}"
                                    required oninvalid="this.setCustomValidity('Masukan Solusi!')"
                                    oninput="setCustomValidity('')">{{ $education->solution }}</textarea>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-warning" href="{{ route('penyuluh.education.index') }}">Cancel</a>
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
