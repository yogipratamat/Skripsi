<html>

<head>
    <title>Faktur Pembayaran</title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }

    </style>
</head>

<body style='font-family:tahoma; font-size:8pt;'>
    <center>
        <table style='width:700px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td style='vertical-align:top' width='30%' align='center'>
                <b><span style='font-size:15pt'>FAKTUR PENJUALAN</span></b><br><br>
                <b><span>Tanggal Pengambilan: {{ idFormat($date) }} </span></b>
            </td>
        </table>
        <br><br>
        <table cellspacing='0'
            style='width:700px; font-size:8pt; font-family:calibri;  border-collapse: collapse; center;' border='1'>
            <tr align='left'>
                <th width='25%'>Nama Produk</th>
                <th width='5%'>Jumlah</th>
                <th width='25%'>Harga Satuan</th>
                <th width='25%'>Total Harga</th>
            </tr>
            @foreach ($order->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->qty }}</td>
                    <td>{{ price($product->pivot->price) }}</td>
                    <td>{{ price($product->pivot->total_price) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan='3'>
                    <div style='text-align:left'>Total Yang Harus Di Bayar</div>
                </td>
                <td style='text-align:left'>{{ price($total) }}</td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:left'>Nama Pemesan</div>
                </td>
                <td style='text-align:left'>{{ $order->farmer->name }}</td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:left'>Tanggal Pesanan</div>
                </td>
                <td style='text-align:left'>{{ idFormat($order->date) }}</td>
            </tr>
        </table>
        <br><br>
        <table style='width:520; font-size:7pt;' cellspacing='2'>
            <tr>
                <td align='right'>Diterima Oleh, <br><br><br><br><u>(.......................)</u></td>
            </tr>
        </table>
    </center>
</body>

</html>
