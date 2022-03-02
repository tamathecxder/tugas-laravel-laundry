@extends('layouts.main')

@section('title', 'Proses Transaksi')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" id="nav-data" aria-current="page" href="#dataLaundry" data-bs-toggle="collapse"
                role="button" aria-expanded="false" aria-controls="collapseExample">Data Laundry</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="nav-form" aria-current="page" href="#formLaundry" data-bs-toggle="collapse"
                role="button" aria-expanded="false" aria-controls="collapseExample">Forms</a>
        </li>
    </ul>
    <div class="card" style="border-top: 0">
        <form method="post" action="{{ route('main-transaksi.store') }}">
            @csrf
            @include('main-transaksi.form')
            @include('main-transaksi.data')
            <input type="hidden" name="id_member" id="idMember">
        </form>
    </div>


@endsection

@push('script')
    <script>
        let subtotal = total = 0;
        // $('#dataLaundry').toggle(true);

        $('#dataLaundry').on('show.bs.collapse', function() {
            $('#formLaundry').collapse('hide');
            $('#nav-form').removeClass('active');
            $('#nav-data').addClass('active');
        });

        $('#formLaundry').on('show.bs.collapse', function() {
            $('#dataLaundry').collapse('hide');
            $('#nav-data').removeClass('active');
            $('#nav-form').addClass('active');
        });

        // Data tables untuk member
        $('#tbl-member').DataTable();

        // Data tables untuk paket
        $('#tbl-paket').DataTable();

        // function pilih data member
        function pilihMember(x) {
            const data = $(x).closest('tr');
            const namaDanJk = data.find('td:eq(1)').text() + "/" + data.find('td:eq(3)').text();
            const biodata = data.find('td:eq(2)').text() + " / " + data.find('td:eq(4)').text();
            const idMember = data.find('.idMember').val();

            $('#namaPelanggan').text(namaDanJk);
            $('#biodataPelanggan').text(biodata);
            $('#idMember').val(idMember);
        }

        // function pilih data paket cucian
        function pilihPaket(y) {
            const data = $(y).closest('tr');
            const namaPaket = data.find('td:eq(1)').text();
            const hargaPaket = data.find('td:eq(2)').text();
            const idPaket = data.find('#idPaket').val();

            let tbody = $('#tbl-transaksi tbody tr td').text();
            let insertToTable = `
                <tr>
                    <td>${namaPaket}</td>
                    <td>${hargaPaket}</td>
                    <td><input type="number" value="1" min="1" class="qty" name="qty[]" size="2" style="width: 50px" /></td>
                    <td><label name="sub_total[]" class="subTotal">${hargaPaket}</label></td>
                    <td><button type="button" class="btnRemovePaket"><span class="fas fa-times-circle"></span></button></td>
                    <td><input type="hidden" name="paket_id[]" value="${idPaket}"></td>
                </tr>
            `;

            if (tbody == 'Belum ada data disini...') {
                $('#tbl-transaksi tbody tr').remove();
            }

            $('#tbl-transaksi tbody').append(insertToTable);

            subtotal += Number(hargaPaket);
            total = subtotal - Number($('#diskon').val()) * Number($('#pajak-harga').val());
            $('#subtotal').text(subtotal);
            $('#total').text(total);
        }

        // fungsi untuk menghitung total keseluruhan
        function hitungTotalAkhir(e) {
            let qty = Number($(e).closest('tr').find('.qty').val());
            let harga = Number($(e).closest('tr').find('td:eq(1)').text());
            let subTotalAwal = Number($(e).closest('tr').find('.subTotal').text());
            let count = qty * harga;
            subtotal = subtotal - subTotalAwal + count;
            total = subtotal - Number($('#diskon').val()) + Number($('#pajak-harga').val());

            $(e).closest('tr').find('.subTotal').text(count);
            $('#subtotal').text(subtotal);
            $('#total').text(total);
        }

        // Event Listener pada pilih Member
        $('#tbl-member').on('click', '.pilihMemberBtn', function() {
            pilihMember(this);
            $('#modalMember').modal('hide');
        });

        // Event Listener pada pilih Paket
        $('#tbl-paket').on('click', '.pilihPaketBtn', function() {
            pilihPaket(this);
            $('#modalPaket').modal('hide');
        });

        // Event Listener pada pengubahan kuantiti
        $('#tbl-transaksi').on('change', '.qty', function() {
            hitungTotalAkhir(this);
        });

        // Event Listener pada saat menghapus paket yang telah dipilih
        $('#tbl-transaksi').on('click', '.btnRemovePaket', function(e) {
            let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').text());

            e.preventDefault();
            swal({
                    title: "Apakah kamu yakin ingin menghapusnya?",
                    text: "Ketik Yes jika yakin, dan No untuk membatalkan",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((req) => {
                    if (req) {
                        subtotal -= subTotalAwal;
                        total -= subTotalAwal;
                        $currentRow = $(this).closest('tr').remove();
                        $('#subtotal').text(subtotal);
                        $('#total').text(total);

                        $(e.target).closest(this).submit();
                        $('#tbl-transaksi tbody tr td').append(`<p>testttt</p>`)

                    } else  {
                        swal.close();
                    }
                });

        });
    </script>
@endpush
