@extends('layouts.master')

@section('asset')

    <script src="/assets/js/app.js"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

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
                                Nama
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
                    Detail Pembagian Subsidi
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
                                                    Jumlah Jatah
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Total Harga
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status Pengambilan
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

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
                                                        {{ $farmer->pivot->qty }} Kg
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

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        @if ($farmer->pivot->status == 0)
                                                            <a
                                                                href="{{ route('admin.subsidy.process', [$subsidy->id, $farmer->id]) }}">
                                                                <button class="btn btn-sm btn-success">
                                                                    Proses
                                                                </button>
                                                            </a>
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
