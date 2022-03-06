@extends('layouts.main')

@section('title', 'Halaman Paket')

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
                            <h6 class="mb-0">Paket Table & Data</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-4">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal"
                                data-bs-target="#inputDataPaket">
                                <i class="material-icons">add</i>&nbsp;&nbsp; Input Data paket
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="inputDataPaket" tabindex="-1" aria-labelledby="inputDataPaketLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="inputDataPaketLabel">Create Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- START FORM --}}
                                        <form role="form" method="post" action="{{ route('paket.store') }}">
                                            @csrf
                                            <div id="method"></div>
                                            <div class="mb-3">
                                                <select id="jenis" name="jenis" class="form-select border form-select-sm"
                                                    aria-label="Default select example" required>
                                                    <option selected>Jenis-jenis paket...</option>
                                                    @foreach ($jenis as $jns)
                                                        <option value="{{ $jns }}">{{ $jns }}</option>
                                                    @endforeach
                                                </select>

                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <select
                                                    class="form-select border form-select-sm @error('outlet_id') is-invalid @enderror"
                                                    name="outlet_id" id="outlet_id">
                                                    <option selected disabled>OUTLET ID</option>
                                                    @foreach ($outlet as $otId)
                                                        <option value="{{ $otId->id }}"
                                                            @if (old('outlet_id') === $otId->id) selected @endif>
                                                            {{ $otId->id }} | {{ $otId->nama }}</option>
                                                    @endforeach
                                                </select>

                                                @error('outlet_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label for="nama_paket" class="form-label">Nama Paket</label>
                                                <input type="text" name="nama_paket" id="nama_paket"
                                                    class="form-control @error('nama_paket') is-invalid @enderror"
                                                    value="{{ old('nama_paket') }}">

                                                @error('nama_paket')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label for="harga" class="form-label">Harga Paket</label>
                                                <input type="text" name="harga" id="harga"
                                                    class="form-control @error('harga') is-invalid @enderror"
                                                    value="{{ old('harga') }}">

                                                @error('harga')
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
                                <a href="{{  route('paket.export')  }}" class="btn btn-success text-decoration-none"><i data-feather="file-text" class="align-items-center"></i> Export</a>
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
                            <h6 class="mb-0">Import Excel Ke Database</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-md-0 mb-4">
                                <form method="post" action="{{ route('paket.import') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8 col-6">
                                            <div class="form-group">
                                                <input type="file" name="file2" class="form-control border" placeholder="Pilih file excel(.xlsx)">
                                            </div>
                                            @error('file2')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <button type="submit" class="btn btn-info" id="submit"><i data-feather="download-cloud"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('paket.table')


@endsection

@push('script')
    <script>
        $(function() {
            $('#tbl-paket').DataTable()
        });

        // menghapus alert
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });

        $("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });

        // delete data paket dengan sweetalert
        $('.delete-paket').click(function(e) {
            e.preventDefault()
            let data1 = $(this).closest('tr').find('td:eq(3)').text()
            let data2 = $(this).closest('tr').find('td:eq(2)').text()
            swal({
                    title: "Apakah kamu yakin ingin menghapusnya?",
                    text: "Paket dengan nama " + data1 + " dengan jenis " + data2 +
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

        $('#inputDataPaket').on('show.bs.modal', function(e) {
            let button = $(e.relatedTarget);
            // console.log(button);
            let id = button.data('id');
            let outlet_id = button.data('outlet_id');
            let jenis = button.data('jenis');
            let nama_paket = button.data('nama_paket');
            let harga = button.data('harga');
            let mode = button.data('mode');
            let modal = $(this);

            if (mode == 'edit') {
                modal.find('.modal-title').text('Edit data Member');
                modal.find('.modal-body #outlet_id').val({
                    outlet_id
                }).change();
                modal.find('.modal-body #jenis').val(jenis).change();
                modal.find('.modal-body #nama_paket').val(nama_paket).change();
                modal.find('.modal-body #harga').val(harga).change();
                modal.find('.modal-footer #btn-submit').text('Update');
                modal.find('.modal-body #method').html('{{ method_field('patch') }}');
                modal.find('.modal-body form').attr('action', 'paket/' + id);
            } else {
                modal.find('.modal-title').text('Input data Paket');
                modal.find('.modal-body #outlet_id').change();
                modal.find('.modal-body #jenis').change();
                modal.find('.modal-body #nama_paket').val('').change();
                modal.find('.modal-body #harga').val('').change();
                modal.find('.modal-footer #btn-submit').text('Input');
                modal.find('.modal-body #method').html('');
            }
        });
    </script>
@endpush
