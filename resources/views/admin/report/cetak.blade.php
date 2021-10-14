<html>

<head>
    <title>Cetak</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        h1 {
            font-family: sans-serif;
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            color: #666;
            text-shadow: 1px 1px 0px #fff;
            border: #ccc 1px solid;
        }

        table th {
            padding: 15px 35px;
            border-left: 1px solid #e0e0e0;
            border-bottom: 1px solid #e0e0e0;
        }


        table tr {
            text-align: center;
            padding-left: 20px;
        }


        table td {
            padding: 15px 35px;
            border-top: 1px solid #ffffff;
            border-bottom: 1px solid #e0e0e0;
            border-left: 1px solid #e0e0e0;
            background: #fafafa;
            background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
            background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
        }

        table tr:last-child td {
            border-bottom: 0;
        }

        table tr:last-child td:first-child {
            -moz-border-radius-bottomleft: 3px;
            -webkit-border-bottom-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        table tr:last-child td:last-child {
            -moz-border-radius-bottomright: 3px;
            -webkit-border-bottom-right-radius: 3px;
            border-bottom-right-radius: 3px;
        }

        table tr:hover td {
            background: #f2f2f2;
            background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
            background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
        }

    </style>
</head>

<body>
    <center>
        <h1>LAPORAN SEWA ALAT</h1>
    </center>
    <table cellspacing='0'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Nama Alat</th>
                <th>Tanggal Pesanan</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rents as $rent)
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td>{{ $rent->farmer->name }}</td>
                    <td>{{ $rent->tool->name }}</td>
                    <td>{{ idFormat($rent->date) }}</td>
                    <td>{{ price($rent->tool->price * $rent->land_area) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align: right;">Total:</td>
                <td>{{ price($total) }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
