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
                <b><span style='font-size:15pt'>BUKTI SELESAI SEWA</span></b><br><br>
                <b><span>Tanggal Selesai Sewa: {{ idFormat($date) }} </span></b>
            </td>
        </table>
        <br><br>
        <table cellspacing='0'
            style='width:700px; font-size:8pt; font-family:calibri;  border-collapse: collapse; center;' border='1'>
            <tr align='left'>
                <th width='15%'>Nama Alat</th>
                <th width='15%'>Luas Lahan</th>
                <th width='20%'>Harga/are</th>
                <th width='25%'>Total Harga</th>
            </tr>
            <tr>
                <td>{{ $rent->tool->name }}</td>
                <td>{{ $rent->land_area }} are</td>
                <td>{{ price($rent->tool->price) }}</td>
                <td>{{ price($rent->tool->price * $rent->land_area) }}</td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:left'>Total Yang Harus Di Bayar</div>
                </td>
                <td style='text-align:left'>{{ price($rent->tool->price * $rent->land_area) }}</td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:left'>Nama Petani</div>
                </td>
                <td style='text-align:left'>{{ $rent->farmer->name }}</td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:left'>Tanggal Pesanan</div>
                </td>
                <td style='text-align:left'>{{ idFormat($rent->date) }}</td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:left'>Status Pesanan</div>
                </td>
                <td style='text-align:left'>
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
                </td>
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
