@extends('layouts.master')

@section('title', 'Subsidi Pemerintah')

@section('asset')
    <!-- Theme JS files -->
    <script src="/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>
    <script src="/global_assets/js/plugins/media/fancybox.min.js"></script>

    <script src="/assets/js/app.js"></script>
    <script src="/global_assets/js/demo_pages/blog_single.js"></script>
    <!-- /theme JS files -->
@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Edukasi & Pengendalian</span>
            </div>
            {{-- <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> --}}
        </div>
    </div>
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                @foreach ($educations as $education)
                    <div class="card blog-horizontal col-12">
                        <div class="card-header">
                            <h5 class="card-title font-weight-semibold">
                                <a class="text-default">{{ $education->name }}</a>
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="card-img-actions mr-3">
                                <img class="card-img img-fluid" src="{{ asset('/storage' . $education->image) }}" alt="">
                            </div>
                            <p class="mt-3"> <b>Ciri-Ciri :</b> {{ $education->ciri }}</p>
                            <p class="mt-3"> <b>Solusi :</b> {{ $education->solution }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- /content area -->
@endsection
