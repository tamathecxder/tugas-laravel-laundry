@extends('layouts.main')

@section('title', 'Melayani tanpa pilih kasih!')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')
    <div class="card border">
        <div class="card-header">
            <h4 class="card-title">Cetak Faktur/Nota</h4>
        </div>
        <div class="card-body" style="margin-top: -30px;">
            <table class="table table-dark table-hover" id="tbl-laporan">
                <thead>
                    <tr>
                        <th scope="col">ID Outlet</th>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">ID Paket</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Kode Invoice</th>
                        <th scope="col">Id Penaggung Jawab</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $trs)
                        <tr>
                            <td>{{ $trs->outlet_id }}</td>
                            <td>{{ $trs->id_transaksi }}</td>
                            <td>{{ $trs->paket_id }}</td>
                            <td>{{ $trs->qty }}</td>
                            <td>{{ $trs->kode_invoice }}</td>
                            <td>{{ $trs->id_user }}</td>
                            <td>{{ $trs->tgl }}</td>
                            <td>
                                <a href="{{ route('laporan.generate') }}" target="_blank">Generate PDF</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


@push('script')
<script>
    $('#tbl-laporan').DataTable();
</script>

@endpush
