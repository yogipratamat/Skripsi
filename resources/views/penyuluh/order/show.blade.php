@extends('layouts.master')

@section('title', 'Detail Pesanan Produk')

@section('asset')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="min-h-screen bg-gray-200 p-10">
        @if(Session::has('success'))
        <div class="col-md-6">
            <div class="text-left">
                <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold">{{ Session('success') }} </span>
                </div>
            </div>
        </div>
        @endif
    <div class="space-y-5">
        @if ($order->status == 0 )

        <div class="mb-5 ">
            <a href="{{ route('penyuluh.order.approve', [$order->id]) }}" class="bg-indigo-600 px-10 py-6 text-lg rounded-md shadow w-auto hover:bg-indigo-800">
                Terima pesanan
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
                            Tanggal
                        </div>
                        <div class="col-span-3">
                           : {{ idFormat($order->date) }}.
                        </div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1">
                            Total Harga
                        </div>
                        <div class="col-span-3">
                           : {{ price($order->price) }}.
                        </div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1">
                            Nama Petani
                        </div>
                        <div class="col-span-3">
                           : {{ $order->farmer->name }}.
                        </div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1">
                            Status Pesanan
                        </div>
                        <div class="col-span-3">
                           :
                           @if ($order->status == 0 )

                            <span class="badge badge-primary">
                                Dipesan
                            </span>

                            @else
                            <span class="badge badge-success">
                                Diterima
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-md">
            <div class="bg-gray-800 rounded-t-md py-2 uppercase text-sm font-normal text-center">
                Detail Produk
            </div>
            <div class="pt-4">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden sm:rounded-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Nama Produk
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Jumlah
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Harga Satuan
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Total Harga
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <!-- Odd row -->
                             @foreach ($order->products as $product)
                             <tr class="bg-white">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                  {{ $product->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  {{ $product->pivot->qty }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  {{ price($product->pivot->price )}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ price($product->pivot->total_price )}}
                                </td>
                              </tr>
                             @endforeach
                              <tr class="text-gray-800">
                                  <td colspan="3" class="px-6 py-4 text-sm text-gray-500 text-right">
                                      Total Harga:
                                  </td>
                                  <td class="text-sm px-6 py-4 text-gray-500">
                                      {{ price($total) }}
                                  </td>
                              </tr>
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
