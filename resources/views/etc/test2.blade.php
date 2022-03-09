@extends('layouts.main')

@section('title', 'Test Sorting')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Simulasi 1</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-8 col-12 z-index-0 fadeIn3 fadeInBottom">
                                    <form id="formBuku" role="form" class="form-start">
                                        <input type="hidden" name="_token" value="kjpktwXYVxgjjvcVPO8cPuq3ghsGU3I9657nTAPI">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">ID Buku</label>
                                            <input type="text" name="id" id="id" class="form-control "
                                                onfocus="focused(this)" onfocusout="defocused(this)" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Judul Buku</label>
                                            <input type="text" name="judul" id="judul" class="form-control"
                                                onfocus="focused(this)" onfocusout="defocused(this)" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Pengarang</label>
                                            <input type="text" name="pengarang" id="pengarang" class="form-control"
                                                onfocus="focused(this)" onfocusout="defocused(this)" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Harga</label>
                                            <input type="text" name="harga" id="harga" class="form-control"
                                                onfocus="focused(this)" onfocusout="defocused(this)" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Kuantitas</label>
                                            <input type="number" name="qty" id="qty" class="form-control"
                                                onfocus="focused(this)" onfocusout="defocused(this)" required>
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-select border" id="tahun-terbit" name="tahun-terbit"
                                                aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                {{ $last = date('Y') - 75 }}
                                                {{ $now = date('Y') }}

                                                @for ($i = $now; $i >= $last; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <button id="btn-simpan" type="submit" class="btn btn-primary btn-sm">Submit</button>
                                        <button id="btn-reset" type="reset" class="btn btn-danger btn-sm">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Tables</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="row">
                            <div class="col-md-2 col-sm-4">
                                <button type="button" id="sorting" class="btn btn-success ms-3 ms-sm-2">Sorting</button>
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="me-1">
                                    <input type="search" name="search" class="form-control border-radius-2xl border"
                                        id="search">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <button class="btn btn-success" type="button" id="btnSearch">Cari</button>
                            </div>
                        </div>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="tblBuku">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Juduk Buku</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pengarang</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kuantitas</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tahun Terbit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="6" align="center">Belum ada data</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            // init variable
            let dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || [];

            $(function () {
                $('#formBuku').on('submit', function(e) {
                    e.preventDefault();

                    dataBuku.push(insert())
                    $('#tblBuku tbody').html(showData(dataBuku));
                });
            })

            function insert() {
                const data = $('#formBuku').serializeArray();
                let newData = {};
                data.forEach(function(item, index) {
                    let name = item['name'];
                    let value = (name === 'id' ||
                                name === 'qty' ||
                                name === 'harga'
                    ? Number(item['value']) : item['value']);

                    newData[name] = value;
                });

                localStorage.setItem('dataBuku', JSON.stringify([...dataBuku, newData]));
                return newData;
            }

            // showData fn
            function showData(dataBuku) {
                let row = '';

                if (dataBuku.length == null) {
                    return row = `<tr><td colspan="3">Belum ada data sama sekali</td></tr>`;
                }

                dataBuku.forEach(function(item, value) {
                    row += `<tr>`;
                    row += `<td>${item['id']}</td>`;
                    row += `<td>${item['judul']}</td>`;
                    row += `<td>${item['pengarang']}</td>`;
                    row += `<td>${item['harga']}</td>`;
                    row += `<td>${item['qty']}</td>`;
                    row += `<td>${item['tahun-terbit']}</td>`;
                    row += `</tr>`;
                });

                return row;
            }
        });
    </script>
@endpush
