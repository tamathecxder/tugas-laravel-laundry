@extends('layouts.main')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')
<div class="col-md-4 mb-lg-0 mb-4">
    <div class="card my-3">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <h6 class="mb-0">Transaksi Table CRUD</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-8 mb-md-0 mb-4">
                    <a class="btn bg-gradient-dark mb-0" href="javascript:;">
                        <i
    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Data</a>
                </div>
            </div>
        </div>
    </div>
</div>
    @include('transaksi.table')


@endsection
