@extends('layouts.main')

@section('title', 'Proses Transaksi')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')
    <form id="formTransaksi">
        @csrf
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Transaksi Laundry</h1>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        {{-- <i class="fas fa-minus"></i> --}}
                    </button>
                </div>

                <div class="text-end">
                    <label for="tgl" class="text-2xl">Tanggal Transaksi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="date" class="py-3 date-picker" id="tgl">

                </div>
            </div>
            <div class="card-body">
                <div style="margin-top: 20px">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div>
                    @include('transaksi.member')
                    @include('transaksi.paket')

                    <div class="card border">
                        <div class="card-body">
                            <label class="form-label text-2xl">Total Harga</label>
                            <div class="input-group mb-3">
                                <input type="text" name="total_harga" id="total_harga"
                                    class="form-control py-3 text-4xl border">
                            </div>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="col-md-12 col-sm-8 col-xs-12 text-end">
                                <button type="button" class="btn btn-success py-3 text-lg">Simpan Transaksi</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection


@push('script')
    <script>
        // script start disini
        let totalHarga = 0;

        $('#tbl-member').on('click', '.pilihMemberBtn', function() {
            let dt = $(this).closest('tr');
            let nama = dt.find('td:eq(1)').text();
            let alamat = dt.find('td:eq(2)').text();
            let tlp = dt.find('td:eq(4)').text();
            let jenis_kelamin = dt.find('td:eq(3)').text();

            $('#nama').text(nama);
            $('#alamat').text(alamat);
            $('#tlp').text(tlp);
            $('#jenis_kelamin').text(jenis_kelamin);
            $('#pilihDataMember').modal('hide');
        });


        function tambahPaket(a) {
            let dt = $(a).closest('tr');
            let id_outlet = dt.find('td:eq(1)').text();
            let jenis = dt.find('td:eq(2)').text();
            let nama_paket = dt.find('td:eq(3)').text();
            let harga = dt.find('td:eq(4)').text();
            let insertToTable = `
                <tr>
                    <td>${id_outlet}</td>
                    <td>${jenis}</td>
                    <td>${nama_paket}</td>
                    <td>${harga}</td>
                    <td><input type="number" value="1" min="1" class="qty"></td>
                    <td><button type="button" class="btnRemovePaket">Remove</button></td>
                    </tr>
            `;

            $('#tbl-paket-utama tbody').append(insertToTable);
            totalHarga += parseFloat(harga);
            $('#total-harga').val(totalHarga);
            $('#pilihDataPaket').modal('hide');
        }

        function calcTotal(a) {
            let qty = parseInt($(a).closest('tr').find('.qty').val());
            let hargaPaket = parseFloat($(a).closest('tr').find('td:eq(3)').text());
            let final = qty * hargaPaket;
            $('#total-paket').val(final);
        }

        // Semua event listener
        $(document).ready(function() {
            $('#tbl-paket').DataTable();
        });

        // pilih paket
        $('#tbl-paket').on('click', '.pilihPaketBtn', function() {
            tambahPaket(this);
        });

        // ganti event qty
        // $('#formTransaksi').on('change', 'btnRemovePaket', function () {
        //     //
        // });
    </script>
@endpush
