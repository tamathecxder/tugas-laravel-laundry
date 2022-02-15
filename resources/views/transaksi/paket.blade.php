<!-- Modal Paket -->
<div class="modal fade" id="pilihDataPaket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tbl-paket" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Id Outlet</th>
                            <th>Jenis Paket</th>
                            <th>Nama Paket</th>
                            <th>Harga Paket</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paket as $pkt)
                            <tr>
                                <td>{{ $x = isset($x) ? ++$x : ($x = 1) }}</td>
                                <td>{{ $pkt->id_outlet }}</td>
                                <td>{{ $pkt->jenis }}</td>
                                <td>{{ $pkt->nama_paket }}</td>
                                <td>{{ $pkt->harga }}</td>
                                <td><button type="button" class="btn btn-info pilihPaketBtn">Pilih</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="card border mb-3">
    <div class="card-header pb-0 p-3">
        <h4 class="card-title mb-3">Paket Table & Data</h4>
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pilihDataPaket">Pilih Paket</button>
    </div>
    <div class="card-body">
        <div class="data-paket">
            <table class="table table-bordered" id="tbl-paket-utama">
                <thead class="table-dark">
                    <tr>
                        <td>ID Outlet</td>
                        <td>Jenis</td>
                        <td>Nama Paket</td>
                        <td>Harga</td>
                        <td>QTY</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


