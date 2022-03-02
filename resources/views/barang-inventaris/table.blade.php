<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Barang Invent table</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="tbl-barang-inventaris">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                    Barang</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Merk Barang</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Kuantiti</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Kondisi Barang</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Tanggal Pengadaan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang_inventaris as $barangInv)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $i = (isset($i) ? ++$i : $i = 1) }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $barangInv->nama_barang }}</p>
                                </td>
                                <td class="text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $barangInv->merk_barang }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $barangInv->qty }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $barangInv->kondisi }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $barangInv->tanggal_pengadaan }}</span>
                                </td>
                                <td class="align-middle d-flex flex-row">
                                    <a href="javascript:;" class="text-white badge badge-sm bg-gradient-primary font-weight-bold text-xs"
                                        data-toggle="tooltip" data-original-title="Edit user" data-bs-toggle="modal" data-bs-target="#inputDataBarangInventaris"
                                        data-mode="edit"
                                        data-id="{{ $barangInv->id }}"
                                        data-nama_barang="{{ $barangInv->nama_barang }}"
                                        data-merk_barang="{{ $barangInv->merk_barang }}"
                                        data-qty="{{ $barangInv->qty }}"
                                        data-kondisi="{{ $barangInv->kondisi }}"
                                        data-tanggal_pengadaan="{{ $barangInv->tanggal_pengadaan }}"
                                        >
                                        Edit
                                    </a> |
                                    <form action="{{ route('barang_inventaris.destroy', $barangInv->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="text-white badge badge-sm bg-gradient-secondary font-weight-bold text-xs delete-barang-inventaris">
                                            Delete
                                        </button>
                                    </form>
                                    @csrf
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
