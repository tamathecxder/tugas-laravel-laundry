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
                            <h6 class="text-white text-capitalize ps-3">Simulasi Gaji Karyawan</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                            <form id="formBarang" role="form" class="form-start">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <input type="hidden" name="_token" value="kjpktwXYVxgjjvcVPO8cPuq3ghsGU3I9657nTAPI">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">ID</label>
                                            <input type="text" name="id" id="id" class="form-control "
                                                onfocus="focused(this)" onfocusout="defocused(this)" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="input-group input-group-outline my-3">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                    <label class="">Tanggal Beli</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8">
                                                    <input type="date" name="tgl_beli" id="tgl_beli" class="form-control"
                                                        onfocus="focused(this)" onfocusout="defocused(this)" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <select id="nama_barang" name="nama_barang"
                                                class="form-select border form-select-sm"
                                                aria-label="Default select example" required>
                                                <option selected disabled>Nama barang ...</option>
                                                <option value="deterjen">Deterjen</option>
                                                <option value="deterjen_sepatu">Deterjen sepatu</option>
                                                <option value="pewangi">Pewangi</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="input-group input-group-outline my-3">
                                                <label for="harga" class="form-label">Harga</label>
                                                <input type="text" name="harga" id="harga" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Jumlah</label>
                                                <input type="number" name="jumlah" id="jumlah" class="form-control "
                                                    onfocus="focused(this)" onfocusout="defocused(this)" required>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="hidden" name="diskon" id="diskon">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="jk" class="form-label">Jenis pembayaran :</label>
                                                </div>
                                                <div class="form-check col-md-3 col-sm-3">
                                                    <input class="form-check-input" type="radio" name="jenis_pembayaran"
                                                        id="jenis_pembayaran" value="cash">
                                                    <label class="form-check-label" for="jenis_pembayaran">
                                                        Cash
                                                    </label>
                                                </div>
                                                <div class="form-check col-md-5 col-sm-3">
                                                    <input class="form-check-input" type="radio" name="jenis_pembayaran"
                                                        id="jenis_pembayaran" value="e-money/transfer">
                                                    <label class="form-check-label" for="jenis_pembayaran">
                                                        E-money/transfer
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button id="btn-simpan" type="submit" class="btn btn-success btn-sm">Input</button>
                                <button id="btn-reset" type="reset" class="btn btn-danger btn-sm">Reset</button>
                            </form>
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
                            <h6 class="text-white text-capitalize ps-3">Table Hasil</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="row">
                            <div class="col-md-2 col-sm-4">
                                <button type="button" id="sorting" class="btn btn-success ms-sm-2">Sorting</button>
                            </div>
                            <div class="col-md-4 col-sm-4 flex-column">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sorting-cash">
                                    <label class="form-check-label" for="sort">
                                        Data Cash
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sorting-emoney">
                                    <label class="form-check-label" for="sort">
                                        Data E-money/Transaksi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-4">
                                <input type="search" name="search" class="ms-2 form-control border" id="search">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success" type="button" id="btnSearch">Cari</button>
                            </div>
                        </div>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="tblKaryawan">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Beli</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama barang</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            QTY</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Diskon</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Total harga</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jenis bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="8" align="center">Belum ada data</td>
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
            let dataBarang = JSON.parse(localStorage.getItem('dataBarang')) || [];

            $('#tblKaryawan tbody').html(showData(dataBarang));

            // insert function to insert data to become an array
            function insert() {
                const data = $('#formBarang').serializeArray();
                let newData = {};

                data.forEach(function(item, index) {
                    let name = item['name'];
                    let value = (name === 'id' ||
                        name === 'jumlah' ||
                        name === 'harga' ?
                        Number(item['value']) : item['value']);

                    newData[name] = value;
                });

                localStorage.setItem('dataBarang', JSON.stringify([...dataBarang, newData]));
                return newData;
            }

            $(function() {
                // show data diawal page refresh
                $('#tblKaryawan tbody').html(showData(dataBarang));

                // mengubah harga secara otomatis
                $('#nama_barang').on('change', function() {
                    let nama_barang = $('#nama_barang').val();
                    let harga = $('#harga').val();
                    console.log(harga);
                    console.log(nama_barang);

                    if (nama_barang == 'deterjen') {
                        $('#harga').val(15000);
                    } else if (nama_barang == 'deterjen_sepatu') {
                        $('#harga').val(25000);
                    } else if (nama_barang == 'pewangi') {
                        $('#harga').val(10000);
                    }
                });

                // filter
                $('#sorting-cash').on('change', function() {
                    alert('sorting cash')
                });

                // events
                $('#formBarang').on('submit', function(e) {
                    e.preventDefault();

                    dataBarang.push(insert());
                    $('#tblKaryawan tbody').html(showData(dataBarang));
                    console.log(dataBarang);
                });

                $('#status_menikah').on('change', function() {
                    let value = $('#status_menikah').val();
                    console.log(value);

                    if (value == 'single') {
                        $('#jml_anak').val('0');
                        $('#jml_anak').attr('readonly', true);
                        $('#jml_anak').attr('disabled', true);
                    } else {
                        $('#jml_anak').attr('readonly', false);
                    }
                });

                // events for sorting button
                $('#sorting').on('click', function() {
                    dataBarang = insertionSort(dataBarang, 'id');

                    $('#tblKaryawan tbody').html(showData(dataBarang));
                    console.log(dataBarang);
                });

                // events search
                // $('#btnSearch').on('click', function(e) {
                //     let textSearch = $('#search').val();
                //     let id = searching(dataBarang, 'id', textSearch);
                //     let data = [];

                //     if (id >= 0)
                //         data.push(dataBarang[id]);
                //     console.log(id);
                //     console.log(data);
                //     $('#tblKaryawan tbody').html(showData(data));
                // });

                $('#btnSearch').on('click', function(e) {
                    let teksSearch = $('#search').val()
                    //let id = searching(dataBuku, 'id', teksSearch)
                    let idx = searching(dataBarang, 'id', teksSearch)
                    console.log(idx)
                    let data = []
                    //if (id >= 0)
                    //data.push(dataBuku[id])
                    for (x = 0; x < idx.length; x++) {
                        data.push(dataBuku[idx[x]])
                        //console.log(x)
                    }


                    $('#tblBuku tbody').html(showData(data))
                })
            });

            // showData fn
            function showData(arr, x) {
                let row = '';
                let countHarga = 0
                let countQty = 0
                let countDiskon = 0
                let countTotal = 0

                if (arr.length === 0) {
                    return row = `<tr><td colspan="8">Belum ada data sama sekali</td></tr>`;
                }

                arr.forEach(function(item, value) {
                    let diskon = 0;
                    let subTotal = item['harga'] * item['jumlah']

                    if (subTotal > 50000) {
                        diskon = 15 / 100 * subTotal
                    }

                    let totalHarga = subTotal - diskon;

                    row += `<tr>`;
                    row += `<td>${item['id']}</td>`;
                    row += `<td>${item['tgl_beli']}</td>`;
                    row += `<td>${item['nama_barang']}</td>`;
                    row += `<td>${item['harga']}</td>`;
                    row += `<td>${item['jumlah']}</td>`;
                    row += `<td>${diskon}</td>`;
                    row += `<td>${totalHarga}</td>`;
                    row += `<td>${item['jenis_pembayaran']}</td>`;
                    row += `</tr>`;

                    countHarga += Number(item['harga']);
                    countQty += Number(item['jumlah']);
                    countDiskon += Number(diskon);
                    countTotal += Number(totalHarga);

                });
                row += '<tr>'
                row += '<td colspan="3" align="center">TOTAL</td>'
                row += `<td>${countHarga}</td>`
                row += `<td>${countQty}</td>`
                row += `<td>${countDiskon}</td>`
                row += `<td>${countTotal}</td>`
                row += '</tr>'
                console.log(countHarga, countQty);

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


            function searching(arr, key, teks) {
                let buffer = []
                for (let i = 0; i < arr.length; i++) {
                    if (arr[i][key] == teks)
                        buffer.push(i)
                }
                return buffer;
            }

            // Searching function
            // function searching(arr, key, text) {
            //     for (let i = 0; i < arr.length; i++) {
            //         if (arr[i][key] == text) {
            //             return i;
            //         }
            //     }
            //     return 'gagal';
            // }

            // menghitung umur
            function calculateAge(birthday) {
                birthday = new Date(birthday);
                let ageDifMs = Date.now() - birthday.getTime();
                let ageDate = new Date(ageDifMs);

                return Math.abs(ageDate.getUTCFullYear() - 1970);
            }
        })
    </script>
@endpush
