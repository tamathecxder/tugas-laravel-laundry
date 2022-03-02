<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
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
		<h2>My Laundry Cabang Utama</h4>
		<h6>Laporan Transaksi Bulanan</h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Outlet_id</th>
				<th>KOde Invoice</th>
				<th>Id Member</th>
				<th>Telepon</th>
				<th>Pekerjaan</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($transaksi as $tr)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$tr->outlet_id}}</td>
				<td>{{$tr->kode_invoice}}</td>
				<td>{{$tr->id_member}}</td>
				<td>{{$tr->tgl}}</td>
				<td>{{$tr->batas_waktu}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
