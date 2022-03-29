@extends('layouts.main')

@section('title', 'Halaman Member')

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

    <div class="row">
        <div class="col-md-4 mb-lg-0 mb-4">
            <div class="card my-3">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Member Table & Data</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-md-0 mb-4">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal"
                                data-bs-target="#inputDataMember">
                                <i class="material-icons">add</i>&nbsp;&nbsp; Input Data member
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="inputDataMember" tabindex="-1"
                            aria-labelledby="inputDataMemberLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="inputDataMemberLabel">Create Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- START FORM --}}
                                        <form role="form" method="post" action="{{ route('member.store') }}">
                                            @csrf
                                            <div id="method"></div>
                                            <div>
                                                <label for="nama" class="form-label">Nama member</label>
                                                <div class="input-group input-group-outline mb-3">
                                                    <input type="text" name="nama" id="nama"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        value="{{ old('nama') }}" placeholder="masukkan nama member">

                                                    @error('nama')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div>
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <div class="input-group input-group-outline mb-3">
                                                    <input type="text" name="alamat" id="alamat"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        value="{{ old('alamat') }}" placeholder="masukkan alamat dari member">

                                                    @error('alamat')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                <select
                                                    class="form-select border form-select-sm @error('jenis_kelamin') is-invalid @enderror"
                                                    name="jenis_kelamin" id="jenis_kelamin">
                                                    <option selected>Pilih jenis kelamin</option>
                                                    <option value="L" @if (old('jenis_kelamin') == 'L') selected @endif>L
                                                    </option>
                                                    <option value="P" @if (old('jenis_kelamin') == 'P') selected @endif>P
                                                    </option>
                                                </select>

                                                @error('jenis_kelamin')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="tlp" class="form-label">Nomor Telepon</label>
                                                <div class="input-group input-group-outline mb-3">
                                                    <input type="text" name="tlp" id="tlp"
                                                        class="form-control @error('tlp') is-invalid @enderror"
                                                        value="{{ old('tlp') }}" placeholder="masukkan nomor telepon dari member">

                                                    @error('tlp')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
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
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0"> Export Data Ke Excel</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-md-0 mb-4">
                                <a href="{{ route('member.export') }}" class="btn btn-success text-decoration-none"><i
                                        data-feather="file-text" class="align-items-center"></i> Export</a>
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
                            <div class="col-md-10">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Import ke Excel
                                </button>
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
                                            <form method="post" action="{{ route('member.import') }}"
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
                                                            <p>Klik <a href="{{ route('member.export-template') }}"
                                                                    class="badge bg-info">disini</a> untuk mendownload
                                                                template
                                                                excel</p>
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
    @include('member.table')


@endsection

@push('script')
    <script>
        $(function() {
            $('#tbl-member').DataTable()
        });

        // menghapus alert
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });

        $("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });

        // delete data member dengan sweetalert
        $('.delete-member').click(function(e) {
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

        $('#inputDataMember').on('show.bs.modal', function(e) {
            let button = $(e.relatedTarget);
            // console.log(button);
            let id = button.data('id');
            let nama = button.data('nama');
            let alamat = button.data('alamat');
            let jenis_kelamin = button.data('jenis_kelamin');
            let tlp = button.data('tlp');
            let mode = button.data('mode');
            let modal = $(this);

            if (mode == 'edit') {
                modal.find('.modal-title').text('Edit data Member');
                modal.find('.modal-body #nama').val(nama).change();
                modal.find('.modal-body #alamat').val(alamat).change();
                modal.find('.modal-body #jenis_kelamin').val(jenis_kelamin).change();
                modal.find('.modal-body #tlp').val(tlp).change();
                modal.find('.modal-footer #btn-submit').text('Update');
                modal.find('.modal-body #method').html('{{ method_field('patch') }}');
                modal.find('.modal-body form').attr('action', 'member/' + id);
            } else {
                modal.find('.modal-title').text('Input data member');
                modal.find('.modal-body #nama').val('').change();
                modal.find('.modal-body #alamat').val('').change();
                modal.find('.modal-body #jenis_kelamin').change();
                modal.find('.modal-body #tlp').val('').change();
                modal.find('.modal-footer #btn-submit').text('Input');
                modal.find('.modal-body #method').html('');
            }
        });
    </script>
@endpush
