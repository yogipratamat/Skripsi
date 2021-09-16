@extends('layouts.master')

@section('asset')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="min-h-screen bg-gray-200 p-10">
    @if(Session::has('success'))
    <div class="alert alert-success border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold">{{ Session('success') }} </span>
    </div>
    @endif
    <div class="space-y-5">
        @if ($rent->status == 0 )

        <div class="mb-5 ">
            <a href="{{ route('admin.rent.approve', [$rent->id]) }}" class="bg-indigo-600 px-10 py-6 text-lg rounded-md shadow w-auto hover:bg-indigo-800">
                Selesai Sewa
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
                            Harga/Are
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
                            Status Pesanan
                        </div>
                        <div class="col-span-3">
                            :
                            @if ($rent->status == 0 )

                            <span class="badge badge-warning">
                                Dipesan
                            </span>

                            @else
                            <span class="badge badge-success">
                                Diselesaikan
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
