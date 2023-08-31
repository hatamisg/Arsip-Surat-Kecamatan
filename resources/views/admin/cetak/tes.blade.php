<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>Pengirim</th>
            <th>Tanggal</th>
        </tr>
        @foreach ($suma as $sum)
            <tr>
                <td>
                    {{ $sum->pengirim }}
                </td>
                <td>
                    {{ $sum->created_at->format('d-m-y') }}
                </td>
            </tr>
        @endforeach
    </table>
</body>
<div class="container">
    <br>
    <form action="{{ route('admin.csuma') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <label for="from" class="col-form-label">From</label>
                <div class="col-md-2">
                    <input type="date" class="form-control input-sm" id="from" name="from">
                </div>
                <label for="from" class="col-form-label">To</label>
                <div class="col-md-2">
                    <input type="date" class="form-control input-sm" id="to" name="to">
                </div>

                <div class="col-md-4">

                    <button type="submit" class="btn btn-secondary btn-sm" name="exportPDF">export PDF</button>

                </div>
            </div>
        </div>
    </form>
    <br>

</div>
</html>
