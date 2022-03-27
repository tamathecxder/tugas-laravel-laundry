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
