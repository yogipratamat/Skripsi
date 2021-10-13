@extends('layouts.master')

@section('title', 'Produk Pestisida')

@section('asset')
    <script src="/global_assets/js/plugins/media/fancybox.min.js"></script>
    <script src="/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script src="/assets/js/app.js"></script>
    <script src="/global_assets/js/demo_pages/ecommerce_product_list.js"></script>

@endsection

@section('breadcum')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Daftar Pestisida</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content">
        <!-- Inner container -->
        <div class="d-flex align-items-start flex-column flex-md-row">
            <div class="w-100 overflow-auto order-2 order-md-1">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-img-actions">
                                        <a href="{{ asset('/storage' . $product->image) }}" data-popup="lightbox">
                                            <img src="{{ asset('/storage' . $product->image) }}" class="card-img"
                                                width="96" alt="">
                                            <span class="card-img-actions-overlay card-img">
                                                <i class="icon-plus3 icon-2x"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <div class="card-body bg-light text-center">
                                    <div class="mb-2">
                                        <h6 class="font-weight-semibold mb-0">
                                            <a href="#" class="text-default">{{ $product->name }}</a>
                                        </h6>

                                        <a href="#" class="text-muted">{{ $product->merk }}</a>
                                    </div>
                                    <div class="mb-2">
                                        <a href="#" class="text-muted">Stok : {{ $product->stock }}</a>
                                    </div>

                                    <h3 class="mb-0 font-weight-semibold">{{ price($product->price) }} </h3>
                                    {{-- <div class="text-muted mb-3">{{ $product->description }}</div> --}}
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">

                                            <label>Masukan Jumlah:</label>
                                            <input value="1" min="1" id="qty-{{ $product->id_product }}" type="number"
                                                name="stock" class="form-control alert" required>

                                        </div>
                                        <input type="hidden" id="price-{{ $product->id_product }}"
                                            value="{{ $product->price }}">
                                        <input type="hidden" id="stock-{{ $product->id_product }}"
                                            value="{{ $product->stock }}">
                                        <input type="hidden" id="image-{{ $product->id_product }}"
                                            value="{{ $product->image }}">
                                        <input type="hidden" id="name-{{ $product->id_product }}"
                                            value="{{ $product->name }}">
                                    </form>
                                    <button data-id="{{ $product->id_product }}" type="button"
                                        class="addCart btn bg-teal-400"><i class="icon-cart-add mr-2"></i> Tambah
                                        Keranjang</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        $(".addCart").click(function() {
            var id = $(this).attr('data-id');

            var qty = $("#qty-" + id).val();
            var stock = $("#stock-" + id).val();
            var price = $("#price-" + id).val();
            var name = $("#name-" + id).val();
            var image = $("#image-" + id).val();
            var totalPrice = (qty * price);


            if (qty > stock) {
                $('.alert').removeClass('alert-warning');
                $('#qty-' + id).addClass('alert-warning').focus();
            } else {
                $.ajax({
                    url: "{{ route('petani.cart.addToCart') }}",
                    data: {
                        id: id,
                        qty: qty,
                        image: image,
                        price: price,
                        totalPrice: totalPrice,
                        name: name
                    },
                    success: function(data) {
                        console.log(data)
                        location.reload();

                    },
                    error: function(response) {
                        console.log(response.data);
                    }
                });
            }


        })
    </script>

@endsection
