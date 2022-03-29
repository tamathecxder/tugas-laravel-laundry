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
                                        <label class="form-label">ID</label>
                                        <div class="input-group input-group-outline mb-3">
                                            <input type="text" name="id" id="id" class="form-control "
                                                onfocus="focused(this)" onfocusout="defocused(this)" required>
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
                                            <label for="nama_barang" class="form-label">Pilih nama barang</label>
                                            <select id="nama_barang" name="nama_barang"
                                                class="form-select border form-select-sm mb-3"
                                                aria-label="Default select example" required>
                                                <option selected disabled>Nama barang ...</option>
                                                <option value="deterjen">Deterjen</option>
                                                <option value="deterjen_sepatu">Deterjen sepatu</option>
                                                <option value="pewangi">Pewangi</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label for="harga" class="form-label">Harga</label>
                                            <div class="input-group input-group-outline mb-3">
                                                <input type="text" name="harga" id="harga" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label class="form-label">Jumlah</label>
                                            <div class="input-group input-group-outline mb-3">
                                                <input type="number" name="jumlah" id="jumlah" class="form-control "
                                                    onfocus="focused(this)" onfocusout="defocused(this)" required>
                                            </div>
                                        </div>
                                        {{-- <div>
                                            <input type="hidden" name="diskon" id="diskon">
                                        </div> --}}
                                        <div class="col-md-6 col-sm-6">
                                            <label for="jk" class="form-label">Jenis pembayaran :</label>
                                            <div class="row">
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
                                    <input class="form-check-input" type="checkbox" id="filter-cash">
                                    <label class="form-check-label" for="sort">
                                        Data Cash
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filter-emoney">
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
                            <table class="table align-items-center mb-0" id="tblBarang">
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
            let dataBarang;
            let filterDataBarang;

            // load data barang transaksi
            dataBarang = filterDataBarang = JSON.parse(localStorage.getItem('dataBarang')) || [];

            // menampilkan data barang transaksi
            $('#tblBarang tbody').html(showData(dataBarang));

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
                filterDataBarang = filterCashAndEmoney(dataBarang);
                filterDataBarang = filterDataBarang.filter(item => {
                    return item.nama_barang.toLowerCase().includes(keyword.toLowerCase());
                });
                $('#tblBarang tbody').html(showData(filterDataBarang));
            }

            // jalankan fungsi filterData ketika 2 checbox ditekan
            $('#filter-cash, #filter-emoney').on('change', function() {
                if ($('#filter-cash').is(':checked') && $('#filter-emoney').is(':checked')) {
                    $('#tblBarang tbody').html(showData(dataBarang));
                } else {
                    filterData('');
                }
            });

            // insert data barang transaksi ke local storage
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
                $('#tblBarang tbody').html(showData(dataBarang));

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

                // events
                $('#formBarang').on('submit', function(e) {
                    e.preventDefault();

                    dataBarang.push(insert());
                    $('#tblBarang tbody').html(showData(dataBarang));
                    console.log(dataBarang);
                });

                // events for sorting button
                $('#sorting').on('click', function() {
                    dataBarang = insertionSort(dataBarang, 'id');

                    $('#tblBarang tbody').html(showData(dataBarang));
                    console.log(dataBarang);
                });

                // events search
                $('#btnSearch').on('click', function(e) {
                    let textSearch = $('#search').val();
                    let thisID = searching(dataBarang, 'id', textSearch);
                    let data = [];

                    for (let x = 0; x < thisID.length; x++) {
                        data.push(dataBarang[thisID[x]]);
                    }

                    console.log(id);
                    console.log(data);
                    $('#tblBarang tbody').html(showData(data));
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
                let countHarga = 0
                let countQty = 0
                let countDiskon = 0
                let countTotal = 0

                if (arr.length === 0) {
                    return row = `<tr><td colspan="8" align="center">Belum ada data sama sekali</td></tr>`;
                }

                arr.forEach(function(item, value) {
                    /*
                     * variable diskon awalnya adalah 0
                     * variable diskon akan diubah jika ada diskon
                     * variable subTotal berisi harga * qty
                     *
                     * ada kondisi dimana ketika subTotal lebih dari 50000
                     * maka diskon akan diubah menjadi 15% dari subTotal
                     * dan variable totalHarga akan berisi subTotal - diskon
                     */
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

                    /*
                     * countHarga tadi diisi dengan harga * qty
                     * countDiskon tadi diisi dengan diskon
                     * countQty tadi diisi dengan qty
                     * countTotalHarga tadi diisi dengan totalHarga
                     */
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
             * searching
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
