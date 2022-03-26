@extends('layouts.main')

@section('title', 'Halaman Penjemputan')

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
        <div class="row justify-content-between">
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
                        <div class="col-md-6 d-flex align-items-center">
                            <h6 class="mb-0">Penjemputan Table & Data</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-4">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal"
                                data-bs-target="#inputDataPenjemputan">
                                <i class="material-icons">add</i>&nbsp;&nbsp; Tambah Data
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="inputDataPenjemputan" tabindex="-1"
                            aria-labelledby="inputDataPenjemputanLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="inputDataPenjemputanLabel">Create Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- START FORM --}}
                                        <form role="form" method="post" action="{{ route('penjemputan.store') }}">
                                            @csrf
                                            <div id="method"></div>
                                            <div class="input-group input-group-outline mb-3">
                                                <select name="member_id" id="member_id"
                                                    class="form-select border form-select-sm">
                                                    @foreach ($member as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>

                                                @error('nama_pelanggan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label for="petugas_penjemputan" class="form-label">Petugas
                                                    Penjemputan</label>
                                                <input type="text" name="petugas_penjemputan" id="petugas_penjemputan"
                                                    class="form-control @error('petugas_penjemputan') is-invalid @enderror"
                                                    value="{{ old('petugas_penjemputan') }}">

                                                @error('petugas_penjemputan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select id="status" name="status" class="form-select border form-select-sm"
                                                    aria-label="Default select example" required>
                                                    @foreach ($status as $sts)
                                                        <option value="{{ $sts }}">{{ $sts }}</option>
                                                    @endforeach
                                                </select>

                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
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
        <div class="col-md-4 mb-lg-0 mb-4">
            <div class="card my-3">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center">
                            <h6 class="mb-0"> Export Data Ke Excel</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-md-0 mb-4">
                                <a href="{{ route('penjemputan.export') }}"
                                    class="btn btn-success text-decoration-none"><i data-feather="file-text"
                                        class="align-items-center"></i> Export</a>
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
                        <div class="col-md-8 col-sm-6 d-flex align-items-center">
                            <h6 class="mb-0">Import Excel Ke <br> Database</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-md-0 mb-4">
                                <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal"
                                    data-bs-target="#formImport">Import ke excel</button>

                                <!-- Modal -->
                                <div class="modal fade" id="formImport" tabindex="-1" aria-labelledby="formImportLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="formImportLabel">Import Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('penjemputan.import') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="file" name="file2" class="form-control border"
                                                            placeholder="Pilih file excel(.xlsx)">
                                                    </div>
                                                    @error('file2')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                    <br>
                                                    <button type="submit" class="btn btn-info" id="submit"><i
                                                            data-feather="download-cloud"></i>Import</button>
                                            </div>
                                            </form>
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
    @include('penjemputan.table')




@endsection

@push('script')
    <script>
        $(function() {
            $('#tbl-penjemputan').DataTable()
        });

        // menghapus alert
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });

        $("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });

        // delete data penjemputan dengan sweetalert
        $('.delete-penjemputan').click(function(e) {
            e.preventDefault()
            let data1 = $(this).closest('tr').find('td:eq(1)').text()
            let data2 = $(this).closest('tr').find('td:eq(2)').text()
            swal({
                    title: "Apakah kamu yakin ingin menghapusnya?",
                    text: "Data penjemputan dengan nama " + data1 + " y6ang beralamatkan di " + data2 +
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

        // status konfirmasi ubah status
        $('.statusTabel').change(function(e) {
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
        });


        $('#inputDataPenjemputan').on('show.bs.modal', function(e) {
            let button = $(e.relatedTarget);
            // console.log(button);
            let id = button.data('id');
            let member_id = button.data('member_id');
            let petugas_penjemputan = button.data('petugas_penjemputan');
            let status = button.data('status');
            let mode = button.data('mode');
            let modal = $(this);

            if (mode == 'edit') {
                modal.find('.modal-title').text('Edit data Penjemputan');
                modal.find('.modal-body #member_id').val(member_id).change();
                modal.find('.modal-body #petugas_penjemputan').val(petugas_penjemputan).change();
                modal.find('.modal-body #status').val(status).change();
                modal.find('.modal-footer #btn-submit').text('Update');
                modal.find('.modal-body #method').html('{{ method_field('patch') }}');
                modal.find('.modal-body form').attr('action', 'penjemputan/' + id);
            } else {
                modal.find('.modal-title').text('Input data Penjemputan');
                modal.find('.modal-body #member_id').change();
                modal.find('.modal-body #petugas_penjemputan').val('').change();
                modal.find('.modal-body #status').val('').change();
                modal.find('.modal-footer #btn-submit').text('Input');
                modal.find('.modal-body #method').html('');
            }
        });
    </script>
@endpush
