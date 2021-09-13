@extends('layouts.master')

@section('asset')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
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
                            Total Harga
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
