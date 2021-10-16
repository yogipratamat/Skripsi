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
                <b><span style='font-size:12pt'>BUKTI PENGAMBILAN SUBSIDI</span></b><br><br>
                <b><span>Tanggal Pengambilan : {{ idFormat($date) }} </span></b>
            </td>
        </table>
        <br><br>
        <table cellspacing='0'
            style='width:700px; font-size:8pt; font-family:calibri;  border-collapse: collapse; center;' border='1'>
            <tr align='left'>
                <th width='25%'>Nama Petani</th>
                <th width='25%'>Luas Lahan</th>
                <th width='25%'>Jumlah Jatah</th>
                <th width='25%'>Total Harga</th>
            </tr>
            <tr>
                <td>{{ $farmer->name }}</td>
                <td>{{ $farmer->land_area }} are</td>
                <td>{{ $subsidyFarmer->qty }} Kg</td>
                <td>{{ price($subsidyFarmer->price) }}</td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:left'>Periode</div>
                </td>
                <td style='text-align:left'>{{ $subsidy->periode }}.</td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:left'>Subsidi</div>
                </td>
                <td style='text-align:left'>{{ $subsidy->type == 1 ? 'Pupuk' : 'Benih' }}.</td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:left'>Nama Produk</div>
                </td>
                <td style='text-align:left'>{{ $subsidy->name }}</td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:left'>Berat</div>
                </td>
                <td style='text-align:left'>{{ $subsidy->qty }} Kg.</td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:left'>Harga/kg</div>
                </td>
                <td style='text-align:left'>{{ price($subsidy->price) }}.</td>
            </tr>
        </table>
        <br><br>
        <table style='width:520; font-size:7pt;' cellspacing='2'>
            <tr>
                <td align='right'>Diterima Oleh, <br><br><br><br><u>(.......................)</u></td>
            </tr>
        </table>
    </center>
</body>:

</html>
