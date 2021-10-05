@extends('layouts.master')

@section('title', 'Detail Subsidi')

@section('asset')

    <script src="/assets/js/app.js"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route('petani.subsidy.index') }}" class="breadcrumb-item">Subsidi Pemerintah</a>
                <span class="breadcrumb-item active">Detail</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="min-h-screen bg-gray-200 p-10">
        <div class="space-y-5">
            <div class="bg-white shadow-md rounded-md">
                <div class="bg-gray-800 rounded-t-md py-2 uppercase text-sm font-normal text-center">
                    Detail Subsidi
                </div>
                <div class="py-4 px-4">
                    <div class="space-y-2 text-gray-600 font-medium">
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Periode
                            </div>
                            <div class="col-span-3">
                                : {{ $subsidy->periode }}.
                            </div>
                        </div>
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Subsidi
                            </div>
                            <div class="col-span-3">
                                : {{ $subsidy->type == 1 ? 'Pupuk' : 'Benih' }}.
                            </div>
                        </div>
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Nama {{ $subsidy->type == 1 ? 'Pupuk' : 'Benih' }}
                            </div>
                            <div class="col-span-3">
                                : {{ $subsidy->name }}.
                            </div>
                        </div>
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Berat
                            </div>
                            <div class="col-span-3">
                                : {{ $subsidy->qty }} Kg.
                            </div>
                        </div>
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Harga/Kg
                            </div>
                            <div class="col-span-3">
                                : {{ price($subsidy->price) }}.
                            </div>
                        </div>
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                Batas Pengambilan
                            </div>
                            <div class="col-span-3">
                                : {{ idFormat($subsidy->date) }}.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-md">
                <div class="bg-gray-800 rounded-t-md py-2 uppercase text-sm font-normal text-center">
                    Detail Pembagian Subsidi Setiap Petani
                </div>
                <div class="pt-4">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nama Petani
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Jumlah
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Total Harga
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Odd row -->
                                            @foreach ($subsidy->farmers as $farmer)
                                                <tr class="bg-white">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $farmer->name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $farmer->pivot->qty }} Kg.
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ price($farmer->pivot->price) }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        @if ($farmer->pivot->status == 0)
                                                            <span class="badge badge-primary">
                                                                Belum Diambil
                                                            </span>
                                                        @else
                                                            <span class="badge badge-success">
                                                                Sudah Diambil
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <!-- More people... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
