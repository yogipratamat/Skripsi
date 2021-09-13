@extends('layouts.master')

@section('title', 'Alat Pertanian')

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
            <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Home</a>
            <span class="breadcrumb-item active">Alat Pertanian</span>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Content area -->
<div class="content">
    <div class="card">
        @if(Session::has('admin'))
        <div class="col-md-6 mt-2">
            <div class="text-left">
                <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold">{{ Session('admin') }} </span>
                </div>
            </div>
        </div>
        @endif
        <div class="card-header bg-white header-elements-inline">
            <h5 class="card-title">Data Alat Pertanian</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a href="{{ route('admin.tool.create') }}" class="btn btn-primary text-white">Tambah Data</a>
                </div>
            </div>
        </div>
        <table class="table text-nowrap table-customers">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Alat</th>
                    <th>Merk</th>
                    <th>Harga Jasa</th>
                    <th>Deskripsi</th>
                    <th>Actions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tools as $tool)
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td>
                        <a href="{{ asset('/storage' . $tool->image) }}" data-popup="lightbox">
                            <img style="width: 100px;" src="{{ asset('/storage' . $tool->image) }}" alt="" class="img-preview rounded">
                        </a>
                    </td>
                    <td>{{ $tool->name }}</td>
                    <td>{{ $tool->merk }}</td>
                    <td>{{ $tool->price }} /Are</td>
                    <td>{{ $tool->description }}</td>
                    <td class="text-right">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu7"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('admin.tool.edit', [$tool]) }}" class="dropdown-item"><i class="icon-pencil7"></i>Edit</a>
                                    <button class="dropdown-item" onclick="hapus({{ $tool->id }})"><i class="icon-bin"></i> Delete</button>
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
            window.location = "{{ url('/') }}" + "/admin/alat/delete/" + id;

        }else{
            window.location = "{{ url('/') }}" + "/admin/alat";
        }
    }

    </script>

@endsection

