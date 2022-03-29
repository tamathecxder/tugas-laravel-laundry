<!DOCTYPE html>
<html>

<head>
    <title>Paket - Download PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    table tr td,
    table tr th {
        font-size: 9pt;
    }
</style>

<body>
    <center>
        <h5>Keseluruhan data dari paket</h4>
            <h6>Laundry Sumber Jaya
        </h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Outlet</th>
                <th>Jenis Paket</th>
                <th>Nama Paket</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($data as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->outlet->nama }}</td>
                    <td>{{ $p->jenis }}</td>
                    <td>{{ $p->nama_paket }}</td>
                    <td>{{ $p->harga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
