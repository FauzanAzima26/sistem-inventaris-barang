@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">

    <!-- Statistik Ringkas -->
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-truck ti-28px"></i></span>
                        </div>
                        <h4 class="mb-0">{{ $barangCount ?? 0 }}</h4>
                    </div>
                    <p class="mb-1">Barang</p>
                    <!-- <p class="mb-0">
                        <span class="text-heading fw-medium me-2">+18.2%</span>
                        <small class="text-muted">than last week</small>
                    </p> -->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-alert-triangle ti-28px"></i></span>
                        </div>
                        <h4 class="mb-0">{{ $kategoriCount ?? 0 }}</h4>
                    </div>
                    <p class="mb-1">Kategori</p>
                    <!-- <p class="mb-0">
                        <span class="text-heading fw-medium me-2">-8.7%</span>
                        <small class="text-muted">than last week</small>
                    </p> -->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-danger"><i class="ti ti-git-fork ti-28px"></i></span>
                        </div>
                        <h4 class="mb-0">{{ $transaksiMasukCount ?? 0 }}</h4>
                    </div>
                    <p class="mb-1">Transaksi Masuk</p>
                    <!-- <p class="mb-0">
                        <span class="text-heading fw-medium me-2">+4.3%</span>
                        <small class="text-muted">than last week</small>
                    </p> -->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-info h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-info"><i class="ti ti-clock ti-28px"></i></span>
                        </div>
                        <h4 class="mb-0">{{ $transaksiKeluarCount ?? 0 }}</h4>
                    </div>
                    <p class="mb-1">Transaksi Keluar</p>
                    <!-- <p class="mb-0">
                        <span class="text-heading fw-medium me-2">-2.5%</span>
                        <small class="text-muted">than last week</small>
                    </p> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Stok Menipis -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <!-- Pindahkan judul ke Card Header agar tata letak konsisten -->
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-label-danger p-2 rounded">
                            <i class="ti ti-alert-triangle ti-sm"></i>
                        </span>

                        <h5 class="card-title mb-0 fw-semibold">
                            Peringatan Stok Menipis
                        </h5>
                    </div>
                </div>
                <div class="card-datatable table-responsive pt-0">
                    <table class="table border-top" id="stokMenipisTable">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="text-center" width="8%">No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th class="text-center">Stok</th>
                                <th>Kategori</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/backend/dashboard.js') }}"></script>
@endpush

@endsection