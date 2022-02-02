@extends('layouts.main')

@section('title', 'Halaman Outlet')

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
                        <h6 class="mb-0">Outlet Table CRUD</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-md-0 mb-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal"
                            data-bs-target="#inputDataOutlet">
                            <i class="material-icons">add</i>&nbsp;&nbsp; CRUD Data Outlet
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="inputDataOutlet" tabindex="-1" aria-labelledby="inputDataOutletLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="inputDataOutletLabel">Create Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{-- START FORM --}}
                                    <form role="form" method="post" action="{{ route('outlet.store') }}">
                                        @csrf
                                        <div id="method"></div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label for="nama" class="form-label">Nama Outlet</label>
                                            <input type="text" name="nama" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama') }}">

                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" name="alamat" id="alamat"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                value={{ old('alamat') }}>

                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label for="tlp" class="form-label">Nomor Telepon</label>
                                            <input type="text" name="tlp" id="tlp"
                                                class="form-control @error('tlp') is-invalid @enderror"
                                                value={{ old('tlp') }}>

                                            @error('tlp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>

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
    @include('outlet.table')


@endsection

@push('script')
    <script>
        $(function() {
            $('#tbl-outlet').DataTable()
        });

        // menghapus alert
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });

        $("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });

        // delete data outlet dengan sweetalert
        $('.delete-outlet').click(function(e) {
            e.preventDefault()
            let data1 = $(this).closest('tr').find('td:eq(1)').text()
            let data2 = $(this).closest('tr').find('td:eq(2)').text()
            swal({
                    title: "Apakah kamu yakin ingin menghapusnya?",
                    text: "Outlet dengan nama " + data1 + " beralamatkan di " + data2 +
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

        $('#inputDataOutlet').on('show.bs.modal', function(e) {
            let button = $(e.relatedTarget);
            // console.log(button);
            let id = button.data('id');
            let nama = button.data('nama');
            let alamat = button.data('alamat');
            let tlp = button.data('tlp');
            let mode = button.data('mode');
            let modal = $(this);

            if (mode == 'edit') {
                modal.find('.modal-title').text('Edit data Outlet');
                modal.find('.modal-body #nama').val(nama).change();
                modal.find('.modal-body #alamat').val(alamat).change();
                modal.find('.modal-body #tlp').val(tlp).change();
                modal.find('.modal-footer #btn-submit').text('Update');
                modal.find('.modal-body #method').html('{{ method_field('patch') }}');
                modal.find('.modal-body form').attr('action', 'outlet/' + id);
            } else {
                modal.find('.modal-title').text('Input data Outlet');
                modal.find('.modal-body #nama').val('').change();
                modal.find('.modal-body #alamat').val('').change();
                modal.find('.modal-body #tlp').val('').change();
                modal.find('.modal-footer #btn-submit').text('Input');
                modal.find('.modal-body #method').html('');
            }
        });
    </script>
@endpush
