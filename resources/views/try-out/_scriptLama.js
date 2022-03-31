 // $('#filter-cash').on('change', function() {
            //     if ($(this).is(':checked')) {
            //         filterDataBarang = dataBarang.filter(item => {
            //             return item.jenis_pembayaran === 'cash';
            //         });
            //         $('#tblKaryawan tbody').html(showData(filterDataBarang));
            //     } else {
            //         $('#tblKaryawan tbody').html(showData(dataBarang));
            //     }
            // });

            // $('#filter-emoney').on('change', function() {
            //     if ($(this).is(':checked')) {
            //         filterDataBarang = dataBarang.filter(item => {
            //             return item.jenis_pembayaran === 'e-money/transfer';
            //         });
            //         $('#tblKaryawan tbody').html(showData(filterDataBarang));
            //     } else {
            //         $('#tblKaryawan tbody').html(showData(dataBarang));
            //     }
            // });

            // // fungsi untuk memfilter cash dan emoney
            // function filterCashAndEmoney(data) {
            //     if ($('#filter-cash').is(':checked')) {
            //         data = data.filter(item => {
            //             return item.jenis_pembayaran === 'cash';
            //         });
            //     }

            //     if ($('#filter-emoney').is(':checked')) {
            //         data = data.filter(item => {
            //             return item.jenis_pembayaran === 'e-money/transfer';
            //         });
            //     }

            //     if ($('#filter-cash').is(':checked') && $('#filter-emoney').is(':checked')) {
            //         data = data.filter(item => {
            //             return item.jenis_pembayaran === 'cash' || item.jenis_pembayaran === 'e-money/transfer';
            //         });
            //     }

            //     return data;
            // }

            // // fungsi untuk memfilter data cash dan emoney dan menampilkan datanya sekaligus
            // function filterData(keyword) {
            //     filterDataBarang = filterCashAndEmoney(dataBarang);
            //     filterDataBarang = filterDataBarang.filter(item => {
            //         return item.nama_barang.toLowerCase().includes(keyword.toLowerCase());
            //     });
            //     $('#tblKaryawan tbody').html(showData(filterDataBarang));
            // }

            // // jalankan fungsi filterData ketika 2 checbox ditekan
            // $('#filter-cash, #filter-emoney').on('change', function() {
            //     if ($('#filter-cash').is(':checked') && $('#filter-emoney').is(':checked')) {
            //         $('#tblKaryawan tbody').html(showData(dataBarang));
            //     } else {
            //         filterData('');
            //     }
            // });


            // function untuk mengurutkan array 2 dimensi menggunakan metode selection sort
            // function selectionSort(arr, sortBy, sortDirection) {
            //     let swapIdX;

            //     for ( let i = 0; i < arr.length; i++ ) {
            //         swapIdX = 1;

            //         // mencari index array dengan data terbesar atau terkecil
            //         for ( let j = i + 1; j < arr.length; j++ ) {
            //             if ( sortDirection === 'ASC' && arr[swapIdX][sortBy] > arr[j][sortBy] ) {
            //                 swapIdX = j;
            //             } else if ( sortDirection === 'DESC' && arr[swapIdX][sortBy] < arr[j][sortBy] ) {
            //                 swapIdX = j;
            //             }
            //         }

            //         // jika ada data yang lebih kecil atau lebih besar dari data index ke-i, maka tukarkan data
            //         if ( swapIdX != 1 ) {
            //             let temp = arr[swapIdX];
            //             arr[swapIdX] = arr[i];
            //             arr[i] = temp;
            //         }
            //     }
            // }

            // const sortAksesoris = () => {
            //     selectionSort(filterdataAksesoris, $('#sort-by').val(), $('#sort-direction').val());
            // }
