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
                <b><span style='font-size:12pt'>ABSEN RAPAT</span></b><br>
            </td>
        </table>
        <br>
        <table cellspacing='0'
            style='width:700px; font-size:8pt; font-family:calibri;  border-collapse: collapse; center;' border='1'>
            <tr>
                <th width='4%'>N0</th>
                <th width='10%'>Nama</th>
                <th width='25%'>Alamat</th>
                <th width='10%'>No HP</th>
                <th width='10%'>Jenis Kelamin</th>
                <th width='10%'>TTD</th>
            </tr>
            @foreach ($farmers as $farmer)
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td>{{ $farmer->name }}</td>
                    <td>{{ $farmer->address }}</td>
                    <td>{{ $farmer->phone }}</td>
                    <td>{{ $farmer->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</td>
                    <td></td>
                </tr>
            @endforeach
        </table>
        <br><br>
        <table style='width:520; font-size:7pt;' cellspacing='2'>
            <tr>
                <td align='right'>Penyelenggara, <br><br><br><br><u>(.......................)</u></td>
            </tr>
        </table>
    </center>
</body>

</html>
