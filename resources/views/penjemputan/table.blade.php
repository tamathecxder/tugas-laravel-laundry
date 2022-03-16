<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Penjemputan table</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="tbl-penjemputan">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Nama pelanggan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Alamat pelanggan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    No. Telp pelanggan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Petugas penjemputan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjemputan as $data)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $i = (isset($i) ? ++$i : $i = 1) }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $data->member->nama }}</p>
                                </td>
                                <td class="text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $data->member->alamat }}</p>
                                </td>
                                <td class="text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $data->member->tlp }}</p>
                                </td>
                                <td class="text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $data->petugas_penjemputan }}</p>
                                </td>
                                <td class="text-sm">
                                    <p class="text-xs font-weight-bold mb-0">@include('penjemputan.status')</p>
                                </td>
                                <td class="align-middle d-flex flex-row">
                                    <a href="javascript:;" class="text-white badge badge-sm bg-gradient-primary font-weight-bold text-xs"
                                        data-toggle="tooltip" data-original-title="Edit user" data-bs-toggle="modal" data-bs-target="#inputDataPenjemputan"
                                        data-mode="edit"
                                        data-id="{{ $data->id }}"
                                        data-member_id="{{ $data->member_id }}"
                                        data-petugas_penjemputan="{{ $data->petugas_penjemputan }}"
                                        data-status="{{ $data->status }}"
                                        >
                                        Edit
                                    </a> |
                                    <form action="{{ route('penjemputan.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="text-white badge badge-sm bg-gradient-secondary font-weight-bold text-xs delete-penjemputan">
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
