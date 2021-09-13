@extends('layouts.master')

@section('title', 'Laporan Pesanan Produk')

@section('asset')
	<!-- Theme JS files -->
	<script src="/global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>
	<script src="/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="/global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
	<script src="/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
	<script src="/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
	<script src="/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script src="/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>

	<script src="/assets/js/app.js"></script>
	<script src="/global_assets/js/demo_pages/ecommerce_customers.js"></script>
	<script src="/global_assets/js/demo_charts/pages/ecommerce/light/customers.js"></script>
	<!-- /theme JS files -->
@endsection

@section('breadcum')
<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
            <span class="breadcrumb-item active">Laporan Pesanan Produk</span>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Content area -->
<div class="content">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Laporan Pesanan Produk</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                </div>
            </div>
        </div>
        <div class="pt-2 pl-3">
            <form action="{{ route('penyuluh.report.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tanggal Awal</label>
                            <input class="form-control" type="date" name="startDate" value="{{ $monthStartDate }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tanggal Akhir</label>
                            <input class="form-control" type="date" name="endDate" value="{{ $monthEndDate }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                            <label>Kelompok Tani</label>
                        <div>
                            <select class="form-control" name="farmer" required oninvalid="this.setCustomValidity('Masukan Subsidi !')" oninput="setCustomValidity('')">
                            <option value="">Pilih Petani</option>
                               @foreach ($farmers as $farmer)
                               <option {{ $farmer->id == $farmerActive ? 'selected':'' }} value="{{ $farmer->id }}">{{ $farmer->name }}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 pt-4">
                        <button type="submit" class="btn btn-primary">
                            Filter
                        </button>
                    </div>
                </div>
            </form>
           </div>
        <table class="table text-nowrap table-customers">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Tanggal Pesanan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td>{{ $order->farmer->name }}</td>
                    <td>{{ idFormat($order->date) }}</td>
                    <td>{{ price($order->price) }}</td>
                </tr>
                @endforeach
                <tr class="bg-secondary text-white">
                    <td class="text-right" colspan="3">Total</td>
                    <td>{{ price($total) }}</td>
                </tr>
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
                window.location = 'http://si-gotani.io/admin/subsidi/delete/' + id;

            }else{
                window.location = 'http://si-gotani.io/admin/subsidi';
            }
        }
    </script>
@endsection
