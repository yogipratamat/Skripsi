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
                            <div class="card card-body bg-light rounded-left-0 border-left-3 border-left-warning">
                                <blockquote class="blockquote d-flex mb-0">
                                    <div>
                                        <p class="mb-1">{{ $education->ciri }}</p>
                                        <footer class="blockquote-footer">Ciri-Ciri</footer>
                                    </div>
                                </blockquote>
                            </div>
                            <div class="card card-body bg-light rounded-left-0 border-left-3 border-left-warning">
                                <blockquote class="blockquote d-flex mb-0">
                                    <div>
                                        <p class="mb-1">{{ $education->solution }}</p>
                                        <footer class="blockquote-footer ">Solusi</footer>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- /content area -->
@endsection
