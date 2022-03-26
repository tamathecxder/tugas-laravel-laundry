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
            <a href="{{ route('laporan.generate') }}" target="_blank" class="btn btn-danger my-2">Generate PDF</a>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $trs)
                        <tr>
                            <td>{{ $trs->outlet->nama }}</td>
                            <td>
                                @foreach ($trs->detail as $dtr)
                                    {{ $dtr->transaksi_id }}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($trs->detail as $paket)
                                    {{ $paket->paket_id }}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($trs->detail as $item)
                                    {{ $item->qty }}
                                @endforeach
                            </td>
                            <td>{{ $trs->kode_invoice }}</td>
                            <td>{{ $trs->user->nama }}</td>
                            <td>{{ $trs->tgl }}</td>
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
