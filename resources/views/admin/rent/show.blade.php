@extends('layouts.master')

@section('asset')

    <script src="/assets/js/app.js"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route('admin.rent.index') }}" class="breadcrumb-item">Pesanan Sewa Alat</a>
                <span class="breadcrumb-item active">Detail</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="min-h-screen bg-gray-200 p-10">
        @if (Session::has('success'))
            <div class="alert alert-success border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="font-weight-semibold">{{ Session('success') }} </span>
            </div>
        @endif
        <div class="space-y-5">
            @if ($rent->status == 0)

                <div class="mb-4 m-auto">
                    <a href="{{ route('admin.rent.approve', [$rent->id_rent]) }}" class="btn btn-success">
                        Selesai Sewa
                    </a>
                    <a href="{{ route('admin.rent.cancel', [$rent->id_rent]) }}" class="btn btn-danger">
                        Batalkan Sewa
                    </a>
                </div>


            @endif
            <div class="bg-white shadow-md rounded-md">
                <div class="bg-gray-800 rounded-t-md py-2 uppercase text-sm font-normal text-center">
                    Detail Pesanan
                </div>
                <div class="py-4 px-4">
                    <div class="space-y-2 text-gray-600 font-medium">
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Nama Petani
                            </div>
                            <div class="col-span-3">
                                : {{ $rent->farmer->name }}.
                            </div>
                        </div>
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Nama Alat
                            </div>
                            <div class="col-span-3">
                                : {{ $rent->tool->name }}.
                            </div>
                        </div>
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Tanggal
                            </div>
                            <div class="col-span-3">
                                : {{ idFormat($rent->date) }}.
                            </div>
                        </div>
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Luas Lahan
                            </div>
                            <div class="col-span-3">
                                : {{ $rent->land_area }} Are.
                            </div>
                        </div>
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Harga/are
                            </div>
                            <div class="col-span-3">
                                : {{ price($rent->tool->price) }}.
                            </div>
                        </div>
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Total Harga
                            </div>
                            <div class="col-span-3">
                                :{{ price($rent->tool->price * $rent->land_area) }}
                            </div>
                        </div>
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Status Pesanan
                            </div>
                            <div class="col-span-3">
                                :
                                @if ($rent->status == 0)

                                    <span class="badge badge-primary">
                                        Dipesan
                                    </span>

                                @elseif ($rent->status == 1)
                                    <span class="badge badge-success">
                                        Diselesaikan
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        Dibatalkan
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
