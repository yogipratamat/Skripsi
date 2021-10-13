@extends('layouts.master')

@section('title', 'Buruh Tani')

@section('asset')
    <!-- Theme JS files -->
    <script src="/global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>
    <script src="/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="/global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
    <script src="/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
    <script src="/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>

    <script src="/assets/js/app.js"></script>
    <script src="/global_assets/js/demo_pages/ecommerce_customers.js"></script>
    <script src="/global_assets/js/demo_charts/pages/ecommerce/light/customers.js"></script>
    <script src="/global_assets/js/demo_pages/gallery_library.js"></script>
    <script src="/global_assets/js/plugins/media/fancybox.min.js"></script>
    <!-- /theme JS files -->
@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Buruh Tani</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        @if (Session::has('admin'))
            <div class="alert alert-success border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="font-weight-semibold">{{ Session('admin') }} </span>
            </div>
        @endif
        <div class="card">
            <div class="card-header bg-white header-elements-inline">
                <h5 class="card-title">Buruh Tani</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a href="{{ route('admin.farm-worker.create') }}" class="btn btn-primary text-white">Tambah
                            Data</a>
                    </div>
                </div>
            </div>
            <table class="table text-nowrap table-customers">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Nama Jasa</th>
                        <th>Harga</th>
                        <th>Phone</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Actions</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($farmWorkers as $farmWorker)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>
                                <a href="{{ asset('/storage' . $farmWorker->image) }}" data-popup="lightbox">
                                    <img style="width: 100px;" src="{{ asset('/storage' . $farmWorker->image) }}" alt=""
                                        class="img-preview rounded">
                                </a>
                            </td>
                            <td>{{ $farmWorker->name }}</td>
                            <td>{{ $farmWorker->service_name }}</td>
                            <td>{{ price($farmWorker->price) }}</td>
                            <td>{{ $farmWorker->phone }}</td>
                            <td>{{ $farmWorker->description }}</td>
                            <td class="text-right">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu7"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('admin.farm-worker.edit', [$farmWorker]) }}"
                                                class="dropdown-item"><i class="icon-pencil7"></i>Edit</a>
                                            <button class="dropdown-item"
                                                onclick="hapus({{ $farmWorker->id_farm_worker }})"><i
                                                    class="icon-bin"></i> Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="pl-0"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /content area -->
@endsection

@section('script')
    <script>
        function hapus(id_farm_worker) {
            var yakin = confirm('Yakin Hapus Data?');
            if (yakin) {
                window.location = "{{ url('/') }}" + "/admin/buruh-tani/delete/" + id_farm_worker;

            } else {
                window.location = "{{ url('/') }}" + "/admin/buruh-tani";
            }
        }
    </script>
@endsection
