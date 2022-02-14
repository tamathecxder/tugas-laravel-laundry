<!-- Modal -->
<div class="modal fade" id="pilihDataMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
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
                            <th>Alamat</th></th>
                            <th>Jenis Kelamin</th>
                            <th>No. Telp</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $mb)
                            <tr>
                                <td>{{ $x = isset($x) ? ++$x : ($x = 1) }}</td>
                                <td>{{ $mb->nama }}</td>
                                <td>{{ Str::limit($mb->alamat, 25, '...') }}</td>
                                <td>{{ $mb->jenis_kelamin }}</td>
                                <td>{{ $mb->tlp }}</td>
                                <td><button type="button" class="btn btn-info pilihMemberBtn">Pilih</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


{{-- Form data member --}}
<div class="card mb-3 border">
    <div class="card-header">
        <h4 class="card-title mb-3">Data Member &nbsp;</h4>
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pilihDataMember">Pilih Member</button>
    </div>
    <div class="card-body">
        <div class="data-member">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td width="10%" class="table-info border" scope="row">Nama</td>
                        <td width="25%" class="border"><span id="nama"></span></td>
                        <td width="10%" class="table-info" scope="row">No. Telepon</td>
                        <td width="25%" class="border"><span id="tlp"></span></td>
                    </tr>
                    <tr>
                        <td width="10%" class="table-info" scope="row">Jenis Kelamin</td>
                        <td width="25%" class="border"><span id="jenis_kelamin"></span></td>
                        <td width="10%" class="table-info" scope="row">Alamat</td>
                        <td width="25%" class="border"><span id="alamat"></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

