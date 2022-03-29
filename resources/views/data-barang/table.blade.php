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
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="tbl-barang">
                            <thead>
                                <div class="ms-4 text-start">
                                    <a href="{{ route('barang.downloadPDF') }}" class="btn btn-info">Download PDF</a>
                                </div>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Barang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        QTY</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Harga</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Waktu Beli</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Supplier</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status Barang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Waktu Update Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_barang as $barang)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $i = (isset($i) ? ++$i : $i = 1) }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $barang->nama_barang }}</p>
                                </td>
                                <td class="text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $barang->qty }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $barang->harga }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $barang->waktu_beli }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $barang->supplier }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">@include('data-barang.status')</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $barang->waktu_update_status }}</span>
                                </td>
                                <td class="align-middle d-flex flex-row">
                                    <a href="javascript:;" class="text-white badge badge-sm bg-gradient-primary font-weight-bold text-xs"
                                        data-toggle="tooltip" data-original-title="Edit user" data-bs-toggle="modal" data-bs-target="#inputDataPenggunaanBarang"
                                        data-mode="edit"
                                        data-id="{{ $barang->id }}"
                                        data-nama_barang="{{ $barang->nama_barang }}"
                                        data-qty="{{ $barang->qty }}"
                                        data-harga="{{ $barang->harga }}"
                                        data-waktu_beli="{{ $barang->waktu_beli }}"
                                        data-supplier="{{ $barang->supplier }}"
                                        data-status="{{ $barang->status }}"
                                        data-waktu_update_status="{{ $barang->waktu_update_status }}"
                                        >
                                        Edit
                                    </a> |
                                    <form action="{{ route('penggunaan_barang.destroy', $barang->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="text-white badge badge-sm bg-gradient-secondary font-weight-bold text-xs delete-barang">
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
</div>
