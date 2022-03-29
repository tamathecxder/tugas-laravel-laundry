<!DOCTYPE html>
<html>
<head>
	<title>Outlet - Download PDF</title>
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
		<h5>Keseluruhan data dari outlet</h4>
		<h6>Laundry Sumber Jaya</h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Outlet</th>
				<th>Alamat</th>
				<th>No. Telp</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($outlet as $data)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $data->nama }}</td>
				<td>{{ $data->alamat }}</td>
				<td>{{ $data->tlp }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
