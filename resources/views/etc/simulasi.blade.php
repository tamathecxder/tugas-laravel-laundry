@extends('layouts.main')

@section('title', 'Sorting')

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
                                    <form id="formKaryawan" role="form" class="form-start">
                                        <input type="hidden" name="_token" value="kjpktwXYVxgjjvcVPO8cPuq3ghsGU3I9657nTAPI">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">ID</label>
                                            <input type="text" name="id" id="id" class="form-control "
                                                onfocus="focused(this)" onfocusout="defocused(this)" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                onfocus="focused(this)" onfocusout="defocused(this)" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jk" class="form-label">Jenis Kelamin</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk" id="jk" value="L">
                                                <label class="form-check-label" for="jk">
                                                    Laki-laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk" id="jk" value="P">
                                                <label class="form-check-label" for="jk">
                                                    Perempuan
                                                </label>
                                            </div>
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
    </div>
    <div class="container-fluid py-4">
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
                            <table class="table align-items-center mb-0" id="tblKaryawan">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            JK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" align="center">Belum ada data</td>
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
        // insert function to insert data to become an array
        function insert() {
            const data = $('#formKaryawan').serializeArray();
            let newData = [];

            data.forEach(function(item, index) {
                let name = item['name'];
                let value = (name === 'id' ? Number(item['value']) : item['value']);
                newData[name] = value;

            });

            return newData;
        }

        $(function() {
            // property
            let dataKaryawan = [];

            // events
            $('#formKaryawan').on('submit', function(e) {
                e.preventDefault();

                dataKaryawan.push(insert());
                $('#tblKaryawan tbody').html(showData(dataKaryawan));
                console.log(dataKaryawan);
            });

            // events for sorting button
            $('#sorting').on('click', function() {
                dataKaryawan = insertionSort(dataKaryawan, 'id');

                $('#tblKaryawan tbody').html(showData(dataKaryawan));
                console.log(dataKaryawan);
            });

            // events search
            $('#btnSearch').on('click', function(e) {
                let textSearch = $('#search').val();
                let id = searching(dataKaryawan, 'id', textSearch);
                let data = [];

                if (id >= 0)
                    data.push(dataKaryawan[id]);
                console.log(id);
                console.log(data);
                $('#tblKaryawan tbody').html(showData(data));
            });
        });

        // showData fn
        function showData(arr) {
            let row = '';

            if (arr.length == null) {
                return row = `<tr><td colspan="3">Belum ada data sama sekali</td></tr>`;
            }

            arr.forEach(function(item, value) {
                row += `<tr>`;
                row += `<td>${item['id']}</td>`;
                row += `<td>${item['nama']}</td>`;
                row += `<td>${item['jk']}</td>`;
                row += `</tr>`;
            });

            return row;
        }

        // inserting to an array
        function insertionSort(arr, key) {
            let i, j, id, value;

            for (i = 1; i < arr.length; i++) {
                value = arr[i];
                id = arr[i][key];
                j = i - 1;

                while (j >= 0 && arr[j][key] > id) {
                    arr[j + 1] = arr[j];
                    j = j - 1;
                }
                arr[j + 1] = value;
            }

            return arr;
        }

        // Search fn
        function searching(arr, key, text) {
            for (let i = 0; i < arr.length; i++) {
                if (arr[i][key] == text) {
                    return i;
                }
            }
            return 'gagal';
        }

    </script>
@endpush
