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
                                    data-bs-target="#inputDataPenggunaanBarang">
                                    <i class="material-icons">add</i>&nbsp;&nbsp; Input Data
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="inputDataPenggunaanBarang" tabindex="-1"
                                aria-labelledby="inputDataPenggunaanBarangLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="inputDataPenggunaanBarangLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="post"
                                                action="{{ route('penggunaan_barang.store') }}">
                                                @csrf
                                                <div id="method"></div>
                                                <div>
                                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                                    <div class="input-group input-group-outline mb-3">
                                                        <input type="text" name="nama_barang" id="nama_barang"
                                                            class="form-control @error('nama_barang') is-invalid @enderror"
                                                            value="{{ old('nama_barang') }}" placeholder="inputkan nama barang">

                                                        @error('nama_barang')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="qty" class="form-label">qty</label>
                                                    <div class="input-group input-group-outline mb-3">
                                                        <input type="number" name="qty" id="qty"
                                                            class="form-control @error('qty') is-invalid @enderror"
                                                            value="{{ old('qty') }}" placeholder="Inputkan kuantitas">

                                                        @error('qty')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <div class="input-group input-group-outline mb-3">
                                                        <input type="text" name="harga" id="harga"
                                                            class="form-control @error('harga') is-invalid @enderror"
                                                            value="{{ old('harga') }}" placeholder="Inputkan harga barang">

                                                        @error('harga')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="waktu_beli">Waktu beli</label>
                                                    <div class="input-group input-group-outline mb-3">
                                                        <input type="datetime-local" name="waktu_beli" id="waktu_beli" value="{{ date('Y-m-d') }}T{{date('h:i')}}"
                                                        class="form-control @error('waktu_beli') is-invalid @enderror">

                                                        @error('waktu_beli')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="supplier" class="form-label">Supplier</label>
                                                    <div class="input-group input-group-outline mb-3">
                                                        <input type="text" name="supplier" id="supplier"
                                                            class="form-control @error('supplier') is-invalid @enderror"
                                                            value="{{ old('supplier') }}" placeholder="Inputkan supplier barang">

                                                        @error('supplier')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label" id="labelStatus">Status</label>
                                                    <select class="form-select border form-select-sm @error('status') is-invalid @enderror" name="status" id="status">
                                                        <option selected disabled>----- STATUS PENGGUNAAN BARANG -----</option>
                                                        @foreach ($status_barang as $status)
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
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0"> Export Data Ke Excel</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-md-0 mb-4">
                                    <a href="{{ route('barang.export') }}"
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
                            <div class="col-md-10 col-sm-6 d-flex align-items-center">
                                <h6 class="mb-0">Import Excel Ke Database</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-md-0 mb-4">
                                    <form method="post" action="{{ route('barang.import') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8 col-6">
                                                <div class="form-group">
                                                    <input type="file" name="excel" class="form-control border"
                                                        placeholder="Pilih file excel(.xlsx)">
                                                </div>
                                                @error('file2')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <button type="submit" class="btn btn-info" id="submit"><i
                                                        data-feather="download-cloud"></i> </button>
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
    </div>
    @include('data-barang.table')

@endsection


@push('script')
    <script>
        // function document ready
        $(function() {
            $('#tbl-barang').DataTable();
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

        $('#inputDataPenggunaanBarang').on('show.bs.modal', function(e) {
            let button = $(e.relatedTarget);
            // console.log(button);
            let id = button.data('id');
            let nama_barang = button.data('nama_barang');
            let qty = button.data('qty');
            let harga = button.data('harga');
            let waktu_beli = button.data('waktu_beli');
            let supplier = button.data('supplier');
            let status = button.data('status');
            let waktu_update_status = button.data('waktu_update_status');
            let mode = button.data('mode');
            let modal = $(this);

            if (mode == 'edit') {
                modal.find('.modal-body #status').hide();
                modal.find('.modal-body #labelStatus').hide();
                modal.find('.modal-title').text('Edit data Penggunaan Barang');
                modal.find('.modal-body #nama_barang').val(nama_barang).change();
                modal.find('.modal-body #qty').val(qty).change();
                modal.find('.modal-body #harga').val(harga).change();
                modal.find('.modal-body #waktu_beli').val(waktu_beli).change();
                modal.find('.modal-body #supplier').val(supplier).change();
                modal.find('.modal-body #status').val(status).change();
                modal.find('.modal-body #waktu_update_status').val(waktu_update_status).change();
                modal.find('.modal-footer #btn-submit').text('Update');
                modal.find('.modal-body #method').html('{{ method_field('patch') }}');
                modal.find('.modal-body form').attr('action', 'penggunaan_barang/' + id);
            } else {
                modal.find('.modal-title').text('Input data barang');
                modal.find('.modal-body #nama_barang').val('').change();
                modal.find('.modal-body #qty').val('').change();
                modal.find('.modal-body #harga').val('').change();
                modal.find('.modal-body #waktu_beli').val('').change();
                modal.find('.modal-body #supplier').val('').change();
                modal.find('.modal-body #status').val('').change();
                modal.find('.modal-body #waktu_update_status').val('').change();
                modal.find('.modal-footer #btn-submit').text('Input');
                modal.find('.modal-body #method').html('');
            }
        });
    </script>
@endpush
