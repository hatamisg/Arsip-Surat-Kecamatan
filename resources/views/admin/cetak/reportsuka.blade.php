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
            <th>Id</th>
            <th>Nomor register SK</th>
            <th>Uraian</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
        </tr>
        @foreach ($PDFReport as $sum)
            <tr>
                <td>
                    {{ $sum->id }}
                </td>
                <td>{{ $sum->noreg }}</td>
                <td>{{ $sum->uraian }}</td>
                <td>{{ $sum->ket }}</td>
                <td>{{ Carbon\Carbon::parse($sum->created_at)->format('d-m-y') }}</td>
            </tr>
        @endforeach
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
