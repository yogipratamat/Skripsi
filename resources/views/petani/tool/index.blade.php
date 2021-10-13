@extends('layouts.master')

@section('title', 'Daftar Alat Pertanian')

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
                <span class="breadcrumb-item active">Daftar Alat</span>
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
                    @foreach ($tools as $tool)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-img-actions mx-1 mt-1">
                                    <a href="#course_preview" data-toggle="modal">
                                        <img src="{{ asset('/storage' . $tool->image) }}" class="img-fluid card-img"
                                            alt="">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h6 class="d-flex font-weight-semibold flex-nowrap mb-0">
                                            <a href="#" class="text-default mr-2">{{ $tool->name }}</a>
                                            <span class="text-success ml-auto">{{ price($tool->price) }} / are</span>
                                        </h6>
                                        <ul class="list-inline list-inline-dotted text-muted mb-0">
                                            <li class="list-inline-item">Merk: <a href="#"
                                                    class="text-muted">{{ $tool->merk }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                                    <div class="mt-2 mt-sm-0">
                                        <a class="btn btn-success"
                                            href="{{ route('petani.tool.show', [$tool->id_tool]) }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /content area -->
@endsection
