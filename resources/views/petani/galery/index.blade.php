@extends('layouts.master')

@section('title', 'Galery Petani')

@section('asset')
    <!-- Theme JS files -->
    <script src="/assets/js/app.js"></script>
    <script src="/global_assets/js/plugins/media/fancybox.min.js"></script>
    <script src="/global_assets/js/demo_pages/gallery.js"></script>

    <script src="/global_assets/js/plugins/notifications/bootbox.min.js"></script>
    <script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>

    <script src="/global_assets/js/demo_pages/components_modals.js"></script>
    <!-- /theme JS files -->
@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Galery Petani</span>
            </div>
        </div>
    </div>
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><span class="font-weight-semibold">GALERY GAPOKTAN</span> :</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
                <a href="{{ route('petani.galery.create-video') }}" class="btn btn-link btn-float text-default"><i
                        class="icon-play text-primary"></i><span class="font-weight-semibold">Tambah Video</span></a>
                <a href="{{ route('petani.galery.create') }}" class="btn btn-link btn-float text-default"><i
                        class="icon-images3 text-primary"></i><span class="font-weight-semibold">Tambah Foto</span></a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="mb-3">
            <h3 class="mb-0 font-weight-semibold">
                Video
            </h3>
        </div>
        <div class="row">
            @foreach ($galeryVideos as $galeryVideo)
                <div class="col-sm-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $galeryVideo->title }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <h6 class="font-weight-semibold">Youtube</h6>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe src="{{ $galeryVideo->link }}" frameborder="0"></iframe>
                                </div>
                                <span>{{ $galeryVideo->description }}</span>
                            </div>
                            <div class="list-icons list-icons-extended ml-2">
                                <a href="{{ route('petani.galery.edit-video', [$galeryVideo]) }}"><i
                                        class="icon-pencil"></i></a>
                            </div>
                            <div class="list-icons list-icons-extended ml-2">
                                <a href="" onclick="hapusvideo()"><i class="icon-bin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /video options -->
        <div class="mb-3">
            <h3 class="mb-0 font-weight-semibold">
                Foto
            </h3>
        </div>
        <div class="row">
            @foreach ($galeryFotos as $galeryFoto)
                <div class="col-sm-12 col-xl-4">
                    <div class="card">
                        <div class="card-img-actions mx-1 mt-1">
                            <img class="card-img img-fluid" src="{{ asset('/storage' . $galeryFoto->image) }}" alt="">
                            <div class="card-img-actions-overlay card-img">
                                <a href="{{ asset('/storage' . $galeryFoto->image) }}"
                                    class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round"
                                    data-popup="lightbox" rel="group">
                                    <i class="icon-plus3"></i>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="d-flex align-items-start flex-nowrap">
                                <div>
                                    <h6 class="font-weight-semibold mr-2">{{ $galeryFoto->title }}</h6>
                                    <span>{{ $galeryFoto->description }}</span>
                                </div>
                                <div class="list-icons list-icons-extended ml-auto">
                                    <a href="{{ route('petani.galery.edit', [$galeryFoto]) }}"><i
                                            class="icon-pencil"></i></a>
                                    <a href="" onclick="hapusfoto()"><i class="icon-bin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- /content area -->
@endsection

@section('script')
    <script>
        function hapusvideo(id) {
            var yakin = confirm('Yakin Hapus Data?');
            if (yakin) {
                window.location = 'http://si-gotani.io/petani/galery/deletevideo/' + id;

            } else {
                window.location = 'http://si-gotani.io/petani/galery';
            }
        }

        function hapusfoto(id) {
            var yakin = confirm('Yakin Hapus Data?');
            if (yakin) {
                window.location = 'http://si-gotani.io/petani/galery/deletefoto/' + id;

            } else {
                window.location = 'http://si-gotani.io/petani/galery';
            }
        }
    </script>

@endsection
