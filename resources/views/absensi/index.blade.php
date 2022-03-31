@extends('layouts.main')

@section('title', 'Sorting')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')
    <div class="container-fluid">
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
        <div class="row">
            <div class="col-md-4 mb-lg-0 mb-4">
                <div class="card my-3">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-12 d-flex align-items-center">
                                <h6 class="mb-0">Penggunaan Barang Table & Data</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-md-0 mb-4">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal"
                                    data-bs-target="#inputDataAbsensi">
                                    <i class="material-icons">add</i>&nbsp;&nbsp; Input Data
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="inputDataAbsensi" tabindex="-1"
                                aria-labelledby="inputDataAbsensiLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="inputDataAbsensiLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="post" action="{{ route('absensi.store') }}">
                                                @csrf
                                                <div id="method"></div>
                                                <div>
                                                    <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                                                    <div class="input-group input-group-outline mb-3">
                                                        <input type="text" name="nama_karyawan" id="nama_karyawan"
                                                            class="form-control @error('nama_karyawan') is-invalid @enderror"
                                                            value="{{ old('nama_karyawan') }}"
                                                            placeholder="inputkan nama karyawan">

                                                        @error('nama_karyawan')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="tanggal_masuk" class="form-label">Tanggal masuk</label>
                                                    <div class="input-group input-group-outline mb-3">
                                                        <input type="date" name="tanggal_masuk" id="tanggal_masuk"
                                                            class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                                            value="{{ old('tanggal_masuk') }}"
                                                            placeholder="Inputkan tanggal masuk karyawan">

                                                        @error('tanggal_masuk')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                                                    <div class="input-group input-group-outline mb-3">
                                                        <input type="time" name="waktu_masuk" id="waktu_masuk"
                                                            class="form-control @error('waktu_masuk') is-invalid @enderror"
                                                            value="{{ old('waktu_masuk') }}"
                                                            placeholder="Inputkan waktu masuk karyawan">

                                                        @error('waktu_masuk')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label" id="labelStatus">Status
                                                        hadir</label>
                                                    <select
                                                        class="form-select border form-select-sm @error('status') is-invalid @enderror"
                                                        name="status" id="status">
                                                        <option selected disabled>----- STATUS KEHADIRAN KARYAWAN -----
                                                        </option>
                                                        @foreach ($status_karyawan as $status)
                                                            <option value="{{ $status }}">
                                                                {{ $status }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('status')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-lg-0 mb-4">
                <div class="card my-3">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <h6 class="mb-0"> Export Data Ke Excel</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('absensi.export') }}" class="btn btn-success text-decoration-none"><i
                                    data-feather="file-text" class="align-items-center"></i> Export</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-lg-0 mb-4">
                <div class="card my-3">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-12 col-sm-6 d-flex align-items-center">
                                <h6 class="mb-0">Import Excel Ke Database</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Import ke Excel
                                    </button>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('absensi.import') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-9 col-6">
                                                        <div class="form-group">
                                                            <input type="file" name="excel" class="form-control border ms-2"
                                                                placeholder="Pilih file excel(.xlsx)">
                                                        </div>
                                                        @error('file2')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                        @enderror

                                                        <div class="my-3">
                                                            <p>Klik <a href="{{ route('absensi.export-template') }}"
                                                                    class="badge bg-info">disini</a> untuk mendownload
                                                                template excel</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="submit" class="btn btn-info" id="submit"><i
                                                                data-feather="download-cloud"></i> </button>
                                                    </div>
                                                    <div class="row">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('absensi.table')

@endsection


@push('script')
    <script>
        // function for datatable to id tbl-barang
        // function document ready
        $(function() {
            $('#tbl-absensi').DataTable();
        });

        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });

        $("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });

        $('.status-barang').on('change', function(e) {
            swal({
                    title: "Apakah kamu yakin ingin menggantinya?",
                    text: "Status tersebut akan diganti",
                    icon: "success",
                    buttons: true,
                    dangerMode: false,
                })
                .then((req) => {
                    if (req) $(e.target).closest('form').submit()
                    else swal.close()
                })
        })

        // delete data outlet dengan sweetalert
        $('.delete-barang').click(function(e) {
            e.preventDefault()
            let data1 = $(this).closest('tr').find('td:eq(1)').text()
            let data2 = $(this).closest('tr').find('td:eq(2)').text()
            swal({
                title: "Apakah kamu yakin ingin menghapusnya?",
                text: `Data absensi karyawan ini akan dihapus?`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((req) => {
                    if (req) $(e.target).closest('form').submit()
                    else swal.close()
                })
        });


        $('.status-absensi').on('change', function(e) {
            swal({
                    title: "Apakah kamu yakin ingin menggantinya?",
                    text: "Status tersebut akan diganti",
                    icon: "success",
                    buttons: true,
                    dangerMode: false,
                })
                .then((req) => {
                    if (req) $(e.target).closest('form').submit()
                    else swal.close()
                })
        })


        $('#inputDataAbsensi').on('show.bs.modal', function(e) {
            let button = $(e.relatedTarget);
            // console.log(button);
            let id = button.data('id');
            let nama_karyawan = button.data('nama_karyawan');
            let tanggal_masuk = button.data('tanggal_masuk');
            let waktu_masuk = button.data('waktu_masuk');
            let status = button.data('status');
            let waktu_selesai_kerja = button.data('waktu_selesai_kerja');
            let mode = button.data('mode');
            let modal = $(this);

            if (mode == 'edit') {
                modal.find('.modal-body #status').hide();
                modal.find('.modal-body #labelStatus').hide();
                modal.find('.modal-title').text('Edit data Penggunaan Barang');
                modal.find('.modal-body #nama_karyawan').val(nama_karyawan).change();
                modal.find('.modal-body #tanggal_masuk').val(tanggal_masuk).change();
                modal.find('.modal-body #waktu_masuk').val(waktu_masuk).change();
                modal.find('.modal-body #status').val(status).change();
                modal.find('.modal-body #waktu_selesai_kerja').val(waktu_selesai_kerja).change();
                modal.find('.modal-footer #btn-submit').text('Update');
                modal.find('.modal-body #method').html('{{ method_field('patch') }}');
                modal.find('.modal-body form').attr('action', 'absensi/' + id);
            } else {
                modal.find('.modal-title').text('Input data barang');
                modal.find('.modal-body #nama_karyawan').val('').change();
                modal.find('.modal-body #tanggal_masuk').val('').change();
                modal.find('.modal-body #waktu_masuk').val('').change();
                modal.find('.modal-body #status').val('').change();
                modal.find('.modal-body #waktu_selesai_kerja').val('').change();
                modal.find('.modal-footer #btn-submit').text('Input');
                modal.find('.modal-body #method').html('');
            }
        });
    </script>
@endpush
