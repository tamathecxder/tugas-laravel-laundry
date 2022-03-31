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
                        <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Simulasi Penjualan Aksesoris</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                            <form id="formAksesoris" role="form" class="form-start">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <input type="hidden" name="_token" value="kjpktwXYVxgjjvcVPO8cPuq3ghsGU3I9657nTAPI">
                                        <label class="form-label">No. Transaksi</label>
                                        <div class="input-group input-group-outline mb-3">
                                            <input type="number" name="no_transaksi" id="no_transaksi" class="form-control "
                                                onfocus="focused(this)" onfocusout="defocused(this)" required placeholder="masukkan nomor transaksi">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label class="form-label">Tanggal Beli</label>
                                        <div class="input-group input-group-outline mb-3">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-8">
                                                    <input type="date" name="tgl_beli" id="tgl_beli" class="form-control"
                                                        onfocus="focused(this)" onfocusout="defocused(this)" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label for="nama_barang" class="form-label">Barang dibeli</label>
                                            <select id="nama_barang" name="nama_barang"
                                                class="form-select border form-select-sm mb-3"
                                                aria-label="Default select example" required>
                                                <option selected disabled>Nama barang ...</option>
                                                <option value="gantungan_kunci">Gantungan Kunci</option>
                                                <option value="ikat_rambut">Ikat Rambut</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label for="warna" class="form-label">Warna</label>
                                            <select id="warna" name="warna"
                                                class="form-select border form-select-sm mb-3"
                                                aria-label="Default select example" required>
                                                <option selected disabled>Nama barang ...</option>
                                                <option value="merah">Merah</option>
                                                <option value="kuning">kuning</option>
                                                <option value="hijau">hijau</option>
                                                <option value="biru">biru</option>
                                                <option value="pink">pink</option>
                                                <option value="abu-abu">abu-abu</option>
                                                <option value="hitam">hitam</option>
                                                <option value="orange">orange</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- harga --}}
                                    <div>
                                        <input type="hidden" name="harga" value="0" id="harga">
                                    </div>
                                    {{-- end harga --}}
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label class="form-label">Jumlah</label>
                                            <div class="input-group input-group-outline mb-3">
                                                <input type="number" name="jumlah" min="1" id="jumlah" class="form-control col-md-4"
                                                    onfocus="focused(this)" onfocusout="defocused(this)" required placeholder="masukkan jumlah barang yang akan dibeli">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label for="jk" class="form-label">Nama Pembeli :</label>
                                            <div class="input-group input-group-outline mb-3">
                                            <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control "
                                                onfocus="focused(this)" onfocusout="defocused(this)" required placeholder="masukkan nomor transaksi">
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
                        <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Table Aksesoris</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="row">
                            <div class="col-md-2 col-sm-4">
                                <button type="button" id="sorting" class="btn btn-success ms-4">Sorting</button>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <input type="search" name="search" class="ms-2 form-control border" id="search">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success" type="button" id="btnSearch">Cari</button>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row align-items-center justify-content-between">
                                    <div class="col-3"><label for="sort-by" class="form-label text-dark ms-5">Urutkan</label></div>
                                    <div class="col-6">
                                        <select name="filter_by" id="sort-by" class="form-select border form-select-sm mb-3">
                                            <option value="id" selected>ID</option>
                                            <option value="nama_barang">Nama Barang</option>
                                            <option value="jumlah">Jumlah / QTY</option>
                                            <option value="harga">Harga</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <select name="sort_direction" id="sort-direction" class="form-select border form-select-sm mb-3">
                                            <option value="ASC" selected>ASC</option>
                                            <option value="DESC">DESC</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="tblAksesoris">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Beli</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama barang</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Warna</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jumlah beli</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama pelanggan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Diskon</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Total harga</th>
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
            let dataAksesoris;
            let filterdataAksesoris;

            // load data barang transaksi
            dataAksesoris = filterdataAksesoris = JSON.parse(localStorage.getItem('dataAksesoris')) || [];

            // menampilkan data barang transaksi
            $('#tblAksesoris tbody').html(showData(dataAksesoris));

            // fungsi untuk memfilter cash dan emoney
            function filterCashAndEmoney(data) {
                if ($('#filter-cash').is(':checked')) {
                    data = data.filter(item => {
                        return item.jenis_pembayaran === 'cash';
                    });
                }

                if ($('#filter-emoney').is(':checked')) {
                    data = data.filter(item => {
                        return item.jenis_pembayaran === 'e-money/transfer';
                    });
                }

                if ($('#filter-cash').is(':checked') && $('#filter-emoney').is(':checked')) {
                    data = data.filter(item => {
                        return item.jenis_pembayaran === 'cash' || item.jenis_pembayaran ===
                            'e-money/transfer';
                    });
                }

                return data;
            }

            // fungsi untuk memfilter data cash dan emoney dan menampilkan datanya sekaligus
            function filterData(keyword) {
                filterdataAksesoris = filterCashAndEmoney(dataAksesoris);
                filterdataAksesoris = filterdataAksesoris.filter(item => {
                    return item.nama_barang.toLowerCase().includes(keyword.toLowerCase());
                });
                $('#tblAksesoris tbody').html(showData(filterdataAksesoris));
            }

            // jalankan fungsi filterData ketika 2 checbox ditekan
            $('#filter-cash, #filter-emoney').on('change', function() {
                if ($('#filter-cash').is(':checked') && $('#filter-emoney').is(':checked')) {
                    $('#tblAksesoris tbody').html(showData(dataAksesoris));
                } else {
                    filterData('');
                }
            });

            // insert data barang transaksi ke local storage
            function insert() {
                const data = $('#formAksesoris').serializeArray();
                let newData = {};

                data.forEach(function(item, index) {
                    let name = item['name'];
                    let value = (name === 'no_transaksi' ||
                        name === 'jumlah' ||
                        name === 'harga' ?
                        Number(item['value']) : item['value']);

                    newData[name] = value;
                });

                localStorage.setItem('dataAksesoris', JSON.stringify([...dataAksesoris, newData]));
                return newData;
            }

            $(function() {
                // merender langsung function showData ketika halaman baru saja direfresh
                $('#tblAksesoris tbody').html(showData(dataAksesoris));

                // mengubah harga secara otomatis
                $('#nama_barang').on('change', function() {
                    let nama_barang = $('#nama_barang').val();
                    let harga = $('#harga').val();
                    console.log(harga);
                    console.log(nama_barang);

                    if (nama_barang == 'gantungan_kunci') {
                        $('#harga').val(5000);
                    } else if (nama_barang == 'ikat_rambut') {
                        $('#harga').val(2500);
                    }
                });

                // events
                $('#formAksesoris').on('submit', function(e) {
                    e.preventDefault();

                    dataAksesoris.push(insert());
                    $('#tblAksesoris tbody').html(showData(dataAksesoris));
                    console.log(dataAksesoris);
                });

                // event untuk sorting
                $('#sorting').on('click', function() {
                    dataAksesoris = insertionSort(dataAksesoris, 'no_transaksi');

                    $('#tblAksesoris tbody').html(showData(dataAksesoris));
                    console.log(dataAksesoris);
                });

                // event search berdasarkan key tertentu
                $('#btnSearch').on('click', function(e) {
                    let textSearch = $('#search').val();
                    let thisID = searching(dataAksesoris, 'no_transaksi', textSearch);
                    let thisNamaBarang = searching(dataAksesoris, 'nama_barang', textSearch);
                    let thisWarna = searching(dataAksesoris, 'warna', textSearch);
                    let thisHarga = searching(dataAksesoris, 'harga', textSearch);
                    let thisNamaPembeli = searching(dataAksesoris, 'nama_pembeli', textSearch);
                    let data = [];

                    for (let x = 0; x < thisID.length; x++) {
                        data.push(dataAksesoris[thisID[x]]);
                    }

                    for (let x = 0; x < thisNamaBarang.length; x++) {
                        data.push(dataAksesoris[thisNamaBarang[x]]);
                    }

                    for (let x = 0; x < thisWarna.length; x++) {
                        data.push(dataAksesoris[thisWarna[x]]);
                    }

                    for (let x = 0; x < thisHarga.length; x++) {
                        data.push(dataAksesoris[thisHarga[x]]);
                    }

                    for (let x = 0; x < thisNamaPembeli.length; x++) {
                        data.push(dataAksesoris[thisNamaPembeli[x]]);
                    }

                    console.log(thisID);
                    console.log(thisNamaBarang);
                    console.log(thisWarna);
                    console.log(thisHarga);
                    console.log(thisNamaPembeli);
                    console.log(data);
                    $('#tblAksesoris tbody').html(showData(data));
                });
            });

            /*
             * showData
             *
             * @param data
             * @returns {string}
             *
             *
             * variable row untuk menampung data yang akan ditampilkan
             * variable countHarga untuk menampung harga yang akan ditampilkan
             * variable countDiskon untuk menampung diskon yang akan ditampilkan
             * variable countTotalHarga untuk menampung total harga yang akan ditampilkan
             *
             */
            function showData(arr, x) {
                let row = '';
                let countHarga = 0;
                let countQty = 0;
                let countDiskon = 0;
                let countTotal = 0;

                if (arr.length === 0) {
                    return row = `<tr><td colspan="9" align="center">Belum ada data sama sekali</td></tr>`;
                }

                arr.forEach(function(item, value) {
                    let diskon = 0;
                    let subTotal = item['harga'] * item['jumlah']

                    // jika subTotal lebih dari 30000 atau jumlah barang minimal 10 maka akan mendapat diskon 20%
                    if (subTotal >= 30000 || item['jumlah'] >= 10) {
                        diskon = 20 / 100 * subTotal
                    }

                    let totalHarga = subTotal - diskon;

                    row += `<tr>`;
                    row += `<td>${item['no_transaksi']}</td>`;
                    row += `<td>${item['tgl_beli']}</td>`;
                    row += `<td>${item['nama_barang']}</td>`;
                    row += `<td>${item['warna']}</td>`;
                    row += `<td>${item['harga']}</td>`;
                    row += `<td>${item['jumlah']}</td>`;
                    row += `<td>${item['nama_pembeli']}</td>`;
                    row += `<td>${diskon}</td>`;
                    row += `<td>${totalHarga}</td>`;
                    row += `</tr>`;
                    countHarga += Number(item['harga']);
                    countQty += Number(item['jumlah']);
                    countDiskon += Number(diskon);
                    countTotal += Number(totalHarga);
                });

                row += '<tr>'
                row += '<td colspan="4" align="center" class="bg-info text-white border">TOTAL</td>'
                row += `<td class="bg-warning text-white border">${countHarga}</td>`
                row += `<td class="bg-warning text-white border">${countQty}</td>`
                row += `<td colspan="1" class="bg-dark border">&nbsp;</td>`
                row += `<td class="bg-warning text-white border">${countDiskon}</td>`
                row += `<td class="bg-warning text-white border">Rp. ${countTotal}</td>`
                row += '</tr>'
                console.log(countHarga, countQty);

                return row;
            }

            /*
             * Insertion Sort
             * @param {Array} arr
             * @param {String} key
             * @return {Array}
             *
             * fungsi insertion sort adalah sebuah algoritma sorting yang berbasis pada pengurutan data secara manual.
             * Algoritma ini dapat digunakan untuk mengurutkan data secara menyusun, mengurutkan data secara acak,
             * mengurutkan data secara secara terurut, mengurutkan data secara secara terbalik, mengurutkan data secara secara terurut secara acak,
             * mengurutkan data secara secara terurut secara secara terbalik, mengurutkan data secara secara terurut secara secara terbalik,
             *
             * pada variabel i, j yang merupakan indeks array, dimana i adalah indeks array yang sedang diproses,
             * variabel id yang merupakan indeks array yang akan diurutkan, dimana id adalah indeks array yang akan diurutkan
             * dan variabel value akan berisi nilai dari array yang akan diurutkan
             *
             * secara pengertian, pengurutan insertion sort dilakukan dengan cara membandingkan dan mengurutkan
             * dua data pertama pada array, kemudian membandingkan data para array berikutnya
             * apakah sudah berada di tempat semestinya
             */

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

            /*
             * Searching
             *
             * @param {Array} arr
             * @param {String} key
             * @param {String} value
             * @return {Array}
             *
             * fungsi searching adalah sebuah algoritma searching yang berbasis pada pencarian data secara manual.
             * variable buffer adalah sebuah array yang berisi data yang akan dicari
             * parameter arr adalah array yang akan dicari
             * parameter key adalah key pada array yang akan dicari
             * parameter teks adalah teks yang dibangingkan dengan key tadi
             * sehingga jika teks yang dibandingkan dengan key tadi sama dengan key maka akan dikembalikan nilai id
             */

            function searching(arr, key, teks) {
                let buffer = []
                for (let i = 0; i < arr.length; i++) {
                    if (arr[i][key] == teks)
                        buffer.push(i)
                }
                return buffer;
            }
        })
    </script>
@endpush
