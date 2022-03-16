<div class="collapse" id="formLaundry">
    <div class="card card-body">
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

        <div class="row justify-content-end">
            <div class="col-md-4 col-sm-12">
                <div class="text-center col-sm-12 col-md-12">
                    <option disabled class="border form-control" value="{{ Auth::user()->outlet_id }}">
                        {{ Auth::user()->Outlet->nama }}</option>
                </div>

            </div>
        </div>

        {{-- data awal pelanggan --}}
        <div class="card border my-3">
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                    <div class="col-md-6">
                        <input type="date" class="border form-control" name="tgl" value="{{ date('Y-m-d') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Estimasi Selesai</label>
                    <div class="col-md-6">
                        <input type="date" class="border form-control" name="batas_waktu"
                            value="{{ date('Y-m-d', strtotime(date('Y-m-d') . '+ 3 day')) }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-info col-2" data-bs-toggle="modal"
                            data-bs-target="#modalMember">
                            <i class="fas fa-plus">Pilih Member</i>
                        </button>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-12 col-form-label fw-bold">Nama Pelanggan</label>
                    <div class="col-sm-10" id="namaPelanggan">
                        -
                    </div>
                </div>
                <div class="form-group row mb-3 col-md-12">
                    <label class="col-sm-2 col-form-label fw-bold">Biodata</label>
                    <div class="col-sm-10" id="biodataPelanggan">
                        -
                    </div>
                </div>
            </div>
        </div>
        {{-- end data awal pelanggan --}}

        {{-- data paket --}}
        <div class="card border my-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-info" id="tambahPaketBtn" data-bs-toggle="modal"
                            data-bs-target="#modalPaket">Tambah Cucian</button>
                    </div>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="tbl-transaksi">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="text-center fst-italic kosong">Belum ada data disini...</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr valign="bottom">
                                    <td width="" colspan="3" align="right">Jumlah Bayar</td>
                                    <td><span id="subtotal">0</span></td>
                                    <td rowspan="4">
                                        <label for="">Pembayaran</label>
                                        <input type="text" class="form-control" name="pembayaran"
                                            style="width: 180px;" value="0">
                                        <div>
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 10px; width: 180px">Bayar</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right">Biaya Tambahan</td>
                                    <td><input type="number" name="biaya_tambahan" style="wight: 150px" value="0"></td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right">Diskon</td>
                                    <td><input type="number" value="0" name="diskon" id="diskon" style="width: 140px">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right">Pajak <input type="number" value="0" min="0"
                                            class="qty" name="pajak" id="pajak-persen" size="2"
                                            style="width: 40px"></td>
                                    <td><span id="pajak-harga">0</span></td>
                                </tr>
                                <tr style="background: black; color: white;" class="fw-bold text-2xl">
                                    <td colspan="3" align="right">Total Bayar Akhir</td>
                                    <td><span id="total">0</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Member -->
<div class="modal fade" id="modalMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tbl-member" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Member</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>No. Telp</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $mb)
                            <tr>
                                <td>
                                    {{ $x = isset($x) ? ++$x : ($x = 1) }}
                                    <input type="hidden" class="idMember" value="{{ $mb->id }}" />
                                </td>
                                <td>{{ $mb->nama }}</td>
                                <td>{{ Str::limit($mb->alamat, 40, '...') }}</td>
                                <td>{{ $mb->jenis_kelamin }}</td>
                                <td>{{ $mb->tlp }}</td>
                                <td><button type="button" class="btn btn-info pilihMemberBtn">Pilih</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Member --}}


<!-- Modal Paket -->
<div class="modal fade" id="modalPaket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tbl-paket" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paket as $pkt)
                            <tr>
                                <td>
                                    {{ $x = isset($x) ? ++$x : ($x = 1) }}
                                    <input type="hidden" class="idPaket" id="idPaket"
                                        value="{{ $pkt->id }}">
                                </td>
                                <td>{{ $pkt->nama_paket }}</td>
                                <td>{{ $pkt->harga }}</td>
                                <td><button type="button" class="btn btn-info pilihPaketBtn">Pilih</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Paket --}}
