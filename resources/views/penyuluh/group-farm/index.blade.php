@extends('layouts.master')

@section('title', 'Kelompok Tani')

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
            <span class="breadcrumb-item active">Kelompok Tani</span>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Content area -->
<div class="content">
    <div class="card">
        @if(Session::has('penyuluh'))
        <div class="col-md-6 mt-2">
            <div class="text-left">
                <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold">{{ Session('penyuluh') }} </span>
                </div>
            </div>
        </div>
        @endif
        <div class="card-header bg-white header-elements-inline">
            <h5 class="card-title">Kelompok Tani</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a href="{{ route('penyuluh.group-farm.create') }}" class="btn btn-primary text-white">Tambah Data</a>
                </div>
            </div>
        </div>
        <table class="table text-nowrap table-customers">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelompok Tani</th>
                    <th>Nama Ketua</th>
                    <th>No HP</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th class="text-center">Actions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groupFarms as $groupFarm)
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td>{{ $groupFarm->name }}</td>
                    <td>{{ $groupFarm->getPic()->name }}</td>
                    <td>{{ $groupFarm->phone }}</td>
                    <td>{{ $groupFarm->vision }}</td>
                    <td>{{ $groupFarm->mission }}</td>
                    <td class="text-right">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu7"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('penyuluh.group-farm.edit', [$groupFarm]) }}" class="dropdown-item"><i class="icon-pencil7"></i>Edit</a>
                                    <button class="dropdown-item" onclick="hapus({{ $groupFarm->id }})"><i class="icon-bin"></i> Delete</button>
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
        function hapus(id) {
            var yakin = confirm('Yakin Hapus Data?');
            if(yakin) {
                window.location = "{{ url('/') }}" + "/penyuluh/kelompok-tani/delete/" + id;

            }else{
                window.location = "{{ url('/') }}" + "/penyuluh/kelompok-tani";
            }
        }

    </script>
@endsection
