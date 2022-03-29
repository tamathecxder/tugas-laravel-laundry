<!DOCTYPE html>
<html>
<head>
	<title>Penggunaan Barang - Download PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Keseluruhan data dari penggunaan barang</h4>
		<h6>Laundry Sumber Jaya</h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>QTY</th>
				<th>Harga</th>
				<th>Waktu beli</th>
				<th>Supplier</th>
				<th>Status barang</th>
				<th>Waktu update status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $barang)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $barang->nama_barang }}</td>
				<td>{{ $barang->qty }}</td>
				<td>{{ $barang->harga }}</td>
				<td>{{ $barang->waktu_beli }}</td>
				<td>{{ $barang->supplier }}</td>
				<td>{{ $barang->status }}</td>
				<td>{{ $barang->waktu_update_status }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
