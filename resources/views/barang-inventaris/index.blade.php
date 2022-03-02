@extends('layouts.main')

@section('title', 'Proses Transaksi')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')

    @if (session('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible text-white" role="alert" id="success-alert">
                    <span class="text-sm">{{ session('success') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible text-white" role="alert" id="error-alert">
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li>{{ $error }}</li>
                        </ul>
                    @endforeach
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="col-md-4 mb-lg-0 mb-4">
        <div class="card my-3">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                        <h6 class="mb-0">Barang Inventaris Table & Data</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-md-0 mb-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal"
                            data-bs-target="#inputDataBarangInventaris">
                            <i class="material-icons">add</i>&nbsp;&nbsp; Input Data Barang Inventaris
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="inputDataBarangInventaris" tabindex="-1" aria-labelledby="inputDatabarang_inventarisLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="inputDataBarangInventaris">Create Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{-- START FORM --}}
                                    <form role="form" method="post" action="{{ route('barang_inventaris.store') }}">
                                        @csrf
                                        <div id="method"></div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label for="nama_barang" class="form-label">Nama Barang</label>
                                            <input type="text" name="nama_barang" id="nama_barang"
                                                class="form-control @error('nama_barang') is-invalid @enderror"
                                                value="{{ old('nama_barang') }}">

                                            @error('nama_barang')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label for="merk_barang" class="form-label">merk_barang</label>
                                            <input type="text" name="merk_barang" id="merk_barang"
                                                class="form-control @error('merk_barang') is-invalid @enderror"
                                                value={{ old('merk_barang') }}>

                                            @error('merk_barang')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label for="qty" class="form-label">Kuantitas</label>
                                            <input type="number" name="qty" id="qty"
                                                class="form-control @error('qty') is-invalid @enderror"
                                                value={{ old('qty') }}>

                                            @error('qty')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <select
                                                class="form-select border form-select-sm @error('kondisi') is-invalid @enderror"
                                                name="kondisi" id="kondisi">
                                                <option selected disabled>--- KONDISI ---</option>
                                                @foreach ($kondisi as $kd)
                                                    <option value="{{ $kd }}" @if( old('kondisi') === $kd ) selected @endif>{{ $kd }} | {{ $kd }}</option>
                                                @endforeach
                                            </select>

                                            @error('kondisi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label for="tanggal_pengadaan" class="form-label">Tanggal Pengadaan</label>
                                            <input type="date" name="tanggal_pengadaan" id="tanggal_pengadaan"
                                                class="form-control @error('tanggal_pengadaan') is-invalid @enderror"
                                                value={{ old('tanggal_pengadaan') }}>

                                            @error('tanggal_pengadaan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="btn-submit">Save changes</button>

                                    {{-- END FORM --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('barang-inventaris.table')
@endsection


@push('script')

<script>
    $(function() {
        $('#tbl-barang-inventaris').DataTable()
    });

    // menghapus alert
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
        $("#success-alert").slideUp(500);
    });

    $("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
        $("#success-alert").slideUp(500);
    });

    // delete data member dengan sweetalert
    $('.delete-barang-inventaris').click(function(e) {
        e.preventDefault()
        let data1 = $(this).closest('tr').find('td:eq(1)').text()
        let data2 = $(this).closest('tr').find('td:eq(4)').text()
        swal({
                title: "Apakah kamu yakin ingin menghapusnya?",
                text: "member dengan nama " + data1 + " dengan nomor telepon " + data2 +
                    " yakin akan dihapus?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((req) => {
                if (req) $(e.target).closest('form').submit()
                else swal.close()
            })
    });

    $('#inputDataBarangInventaris').on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);
        // console.log(button);
        let id = button.data('id');
        let nama_barang = button.data('nama_barang');
        let merk_barang = button.data('merk_barang');
        let qty = button.data('qty');
        let kondisi = button.data('kondisi');
        let tanggal_pengadaan = button.data('tanggal_pengadaan');
        let mode = button.data('mode');
        let modal = $(this);

        if (mode == 'edit') {
            modal.find('.modal-title').text('Edit data barang invent');
            modal.find('.modal-body #nama_barang').val(nama_barang).change();
            modal.find('.modal-body #merk_barang').val(merk_barang).change();
            modal.find('.modal-body #qty').val(qty).change();
            modal.find('.modal-body #kondisi').val(kondisi).change();
            modal.find('.modal-body #tanggal_pengadaan').val(tanggal_pengadaan).change();
            modal.find('.modal-footer #btn-submit').text('Update');
            modal.find('.modal-body #method').html('{{ method_field('patch') }}');
            modal.find('.modal-body form').attr('action', 'barang_inventaris/' + id);
        } else {
            modal.find('.modal-title').text('Input data barang invent');
            modal.find('.modal-body #nama_barang').val('').change();
            modal.find('.modal-body #merk_barang').val('').change();
            modal.find('.modal-body #qty').change();
            modal.find('.modal-body #kondisi').val('').change();
            modal.find('.modal-body #tanggal_pengadaan').val('').change();
            modal.find('.modal-footer #btn-submit').text('Input');
            modal.find('.modal-body #method').html('');
        }
    });
</script>
@endpush
