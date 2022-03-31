<!DOCTYPE html>
<html>
<head>
	<title>Absensi Karyawan - Download PDF</title>
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
		<h5>Keseluruhan data dari Absensi karyawan</h4>
		<h6>Laundry Sumber Jaya</h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Tanggal Masuk</th>
				<th>Waktu Masuk</th>
				<th>Status</th>
				<th>Waktu Selesai Kerja</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $absensi)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $absensi->nama_karyawan }}</td>
				<td>{{ $absensi->tanggal_masuk }}</td>
				<td>{{ $absensi->waktu_masuk }}</td>
				<td>{{ $absensi->status }}</td>
				<td>{{ $absensi->waktu_selesai_kerja }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
