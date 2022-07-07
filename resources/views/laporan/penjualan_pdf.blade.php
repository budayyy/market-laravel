<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan </title>

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>
<body>
    
    <div class="text-center">
        <h5>Laporan Data Penjualan Bina Apps</h5>
    </div>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Total Terjual</th>
                <th>Harga Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualan as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->ctg_name }}</td>
                    <td>{{ $row->terjual }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>