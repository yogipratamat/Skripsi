@extends('layouts.master')

@section('title', 'Dashboard')

@section('asset')
    <!-- Theme JS files -->
    <script src="/global_assets/js/plugins/media/fancybox.min.js"></script>

    <script src="/assets/js/app.js"></script>
    <script src="/global_assets/js/demo_pages/gallery.js"></script>
    <!-- /theme JS files -->
@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Dashboard</span>
            </div>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
@endsection

@section('content')

    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-lg-4">
                <div class="card bg-teal-400">
                    <div class="card-body">
                        <div class="d-flex">
                            <h1 class="font-weight-semibold mb-0">Nama Kelompok Tani :</h1>
                        </div>
                        <div>
                            {{ $farmer->groupFarm->name }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-pink-400">
                    <div class="card-body">
                        <div class="d-flex">
                            <h1 class="font-weight-semibold mb-0">Visi :</h1>
                        </div>
                        <div>
                            {{ $farmer->groupFarm->vision }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-blue-400">
                    <div class="card-body">
                        <div class="d-flex">
                            <h1 class="font-weight-semibold mb-0">Misi :</h1>
                        </div>
                        <div>
                            {{ $farmer->groupFarm->mission }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($educations as $education)

            @endforeach
        </div>
    </div>
@endsection
