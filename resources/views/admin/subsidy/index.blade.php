@extends('layouts.master')

@section('title', 'Subsidi Pemerintah')

@section('asset')
    <!-- Theme JS files -->
    <script src="/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>

    <script src="/assets/js/app.js"></script>
    <script src="/global_assets/js/demo_pages/datatables_basic.js"></script>
    <!-- /theme JS files -->
@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Subsidi Pemerintah</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content">
        @if (Session::has('admin'))
            <div class="alert alert-success border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="font-weight-semibold">{{ Session('admin') }} </span>
            </div>
        @endif
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Subsidi Pemerintah</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a href="{{ route('admin.subsidy.create') }}" class="btn btn-primary text-white">Tambah Data</a>
                    </div>
                </div>
            </div>
            <table class="table datatable-basic table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Periode</th>
                        <th>Subsidy</th>
                        <th>Nama</th>
                        <th>Berat</th>
                        <th class="text-center">Batas<br>Pengambilan</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subsidies as $subsidy)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{{ $subsidy->periode }}</td>
                            <td>{{ $subsidy->type == 1 ? 'Pupuk' : 'Benih' }}</td>
                            <td>{{ $subsidy->name }}</td>
                            <td>{{ $subsidy->qty }} Kg</td>
                            <td>{{ $subsidy->date }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('admin.subsidy.show', [$subsidy]) }}"
                                                class="dropdown-item"><i class="icon-eye"></i>Detail</a>
                                            <a href="{{ route('admin.subsidy.edit', [$subsidy->id_subsidy]) }}"
                                                class="dropdown-item"><i class="icon-pencil7"></i>Edit</a>
                                            <button class="dropdown-item" onclick="hapus({{ $subsidy->id_subsidy }})"><i
                                                    class="icon-bin"></i>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function hapus(id_subsidy) {
            var yakin = confirm('Yakin Hapus Data?');
            if (yakin) {
                window.location = "{{ url('/') }}" + "/admin/subsidi/delete/" + id_subsidy;

            } else {
                window.location = "{{ url('/') }}" + "/admin/subsidi";
            }
        }
    </script>
@endsection
