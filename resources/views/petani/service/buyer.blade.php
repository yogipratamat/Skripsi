@extends('layouts.master')

@section('title', 'Daftar Pembeli Padi')

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
                <span class="breadcrumb-item active">Daftar Pembeli Padi</span>
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
                    @foreach ($buyers as $buyer)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-img-actions mx-1 mt-1">
                                    <a href="#course_preview" data-toggle="modal">
                                        <img src="{{ asset('/storage' . $buyer->image) }}" class="img-fluid card-img"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h6 class="d-flex font-weight-semibold flex-nowrap mb-0">
                                            <a href="#" class="text-default mr-2">
                                                {{ $buyer->name }}</a>
                                            <span class="text-success ml-auto">{{ price($buyer->price) }}</span>
                                        </h6>
                                    </div>
                                    {{-- <span>{{ $buyer->description }}</span> --}}
                                </div>

                                <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                                    <ul class="list-inline list-inline-dotted mb-0">
                                        <a class="text-muted" href="https://wa.me/{{ $buyer->phone }}">No HP :
                                            {{ $buyer->phone }}</a>
                                    </ul>

                                    <div class="mt-2 mt-sm-0">
                                        <a class="btn btn-outline-success"
                                            href="https://wa.me/{{ $buyer->phone }}">Hubungi</a>
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
