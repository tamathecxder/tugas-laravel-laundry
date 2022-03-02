<div class="collapse" id="dataLaundry">
    <div class="card card-body">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        {{-- <a href="{{ route('main-transaksi.test-faktur' . $paket->id) }}" class="btn btn-warning">TEST</a> --}}
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Authors table</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Invoice
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID Member</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Paket</>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Batas Waktu</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pembayaran</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($results as $data)
                                        <tr>
                                            <td class=" text-sm">
                                                <h6 class="mb-0 text-sm">{{ $data['kode_invoice'] }}</h6>
                                            </td>
                                            <td class=" text-sm">
                                                <h6 class="mb-0 text-sm">{{ $data['id_member'] }}</h6>
                                            </td>
                                            <td class=" text-sm">
                                                <h6 class="mb-0 text-sm">{{ $data['paket_id'] }}</h6>
                                            </td>
                                            <td class=" text-sm">
                                                <h6 class="mb-0 text-sm">{{ $data['tgl'] }}</h6>
                                            </td>
                                            <td class=" text-sm">
                                                <h6 class="mb-0 text-sm">{{ $data['batas_waktu'] }}</h6>
                                            </td>
                                            <td class=" text-sm">
                                                <h6 class="mb-0 text-sm">{{ $data['status'] }}</h6>
                                            </td>
                                            <td class=" text-sm">
                                                <h6 class="mb-0 text-sm">{{ $data['pembayaran'] }}</h6>
                                            </td>
                                            <td class="d-flex flex-row text-sm">
                                                <a href="download_pdf/{{ $data['kode_invoice'] }}" class="btn btn-info btn-sm" target="_blank">Download PDF</a> &nbsp;
                                                <a href="{{ route('stream-pdf') }}" class="btn btn-danger btn-sm" target="_blank">Stream</a>
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
</div>







