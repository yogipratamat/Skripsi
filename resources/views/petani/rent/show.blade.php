@extends('layouts.master')

@section('title', 'Detail Pesanan Alat')

@section('asset')

    <script src="/assets/js/app.js"></script>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route('petani.rent.index') }}" class="breadcrumb-item">Pesanan Alat</a>
                <span class="breadcrumb-item active">Detail Pesanan Alat</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="min-h-screen bg-gray-200 p-10">
        <div class="space-y-5">
            <div class="bg-white shadow-md rounded-md">
                <div class="bg-gray-800 rounded-t-md py-2 uppercase text-sm font-normal text-center">
                    Detail Penyewaan
                </div>
                <div class="py-4 px-4">
                    <div class="space-y-2 text-gray-600 font-medium">
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
                                Harga / Are
                            </div>
                            <div class="col-span-3">
                                : {{ price($rent->tool->price) }}.
                            </div>
                        </div>
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
                                Luas Lahan
                            </div>
                            <div class="col-span-3">
                                : {{ $rent->land_area }} are.
                            </div>
                        </div>
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Total Harga
                            </div>
                            <div class="col-span-3">
                                : :{{ price($rent->tool->price * $rent->land_area) }}
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
