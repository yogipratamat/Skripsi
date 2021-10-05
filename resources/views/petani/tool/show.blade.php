@extends('layouts.master')

@section('title', 'Detail Alat Membajak')

@section('asset')
    <!-- Theme JS files -->
    <script src="/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script src="/assets/js/app.js"></script>
    <script src="/global_assets/js/demo_pages/learning.js"></script>
    <!-- /theme JS files -->
@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route('petani.tool.index') }}" class="breadcrumb-item"></i>Alat</a>
                <span class="breadcrumb-item active">Detail Alat</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-flex align-items-start flex-column flex-md-row">
            <div class="w-100 overflow-auto order-2 order-md-1">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-img-actions mx-1 mt-1">
                                <a href="#course_preview" data-toggle="modal">
                                    <img src="{{ asset('/storage' . $tool->image) }}" class="img-fluid card-img" alt="">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <h6 class="d-flex font-weight-semibold flex-nowrap mb-0">
                                        <a href="#" class="text-default mr-2">{{ $tool->name }}</a>
                                        <span class="text-success ml-auto">{{ price($tool->price) }}</span>
                                    </h6>
                                    <ul class="list-inline list-inline-dotted text-muted mb-0">
                                        <li class="list-inline-item">Merk: <a href="#"
                                                class="text-muted">{{ $tool->merk }}</a></li>
                                    </ul>
                                </div>
                                <span>{{ $tool->description }}</span>
                            </div>

                            <div class="mx-3">
                                <form action="{{ route('petani.tool.show', [$tool->id]) }}">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <input required type="number" placeholder="Luas Lahan" name="area"
                                                class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <input required value="{{ $date }}" name="date" type="date"
                                                class="form-control">
                                        </div>
                                        <div class="col-sm-3 mt-1">
                                            @if ($avaiable >= 0)
                                                Tersedia: {{ $avaiable }} are
                                            @endif
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-primary hover mb-1 " type="submit" name="check">Cek
                                                Ketersediaan</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" name="rent" value="rent" class="btn btn-success mb-5">Sewa
                                                Sekarang</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /content area -->
@endsection
