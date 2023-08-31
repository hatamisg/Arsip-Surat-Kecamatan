<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <img src="{{ asset('assets/assets/gas.png') }}"
        style=" align: center; position: center; width: 100%; height: 70%;">
    <h3 align="center"><b>Laporan Surat Masuk</b></h3>
    <table class="static" align="center" rules="all" border="1" style="width: 85%;">
        <tr>
            <th>&nbsp;&nbsp;No</th>
            <th>&nbsp;&nbsp;Pengirim</th>
            <th>&nbsp;&nbsp;Nomor Surat</th>
            <th>&nbsp;&nbsp;Ringkasan</th>
            <th>&nbsp;&nbsp;Tujuan</th>
            <th>&nbsp;&nbsp;Keterangan</th>
            <th>&nbsp;&nbsp;Tanggal</th>
        </tr>
        @foreach ($PDFReport as $sum)
            <tr>
                <td>
                    &nbsp;&nbsp;{{ $sum->id }}
                </td>
                <td>
                    &nbsp;&nbsp;{{ $sum->pengirim }}
                </td>
                <td>&nbsp;&nbsp;{{ $sum->no }}</td>
                <td>&nbsp;&nbsp;{{ $sum->ringkasan }}</td>
                <td>&nbsp;&nbsp;{{ $sum->tujuan }}</td>
                <td>&nbsp;&nbsp;{{ $sum->ket }}</td>
                <td>&nbsp;&nbsp;{{ Carbon\Carbon::parse($sum->created_at)->format('d-m-y') }}</td>
            </tr>
        @endforeach
    </table>
    <script type="text/javascript">
        window.print();

    </script>
</body>

</html>