@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">
    <!-- Stok Menipis -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <!-- Pindahkan judul ke Card Header agar tata letak konsisten -->
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-label-primary p-2 rounded">
                            <i class="ti ti-chart-bar ti-md"></i>
                        </span>

                        <h5 class="card-title mb-0 fw-semibold">
                            Laporan Transaksi
                        </h5>
                    </div>
                </div>
                <div class="card-datatable table-responsive pt-0">
                    <table class="table border-top" id="barangTable">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="text-center" width="8%">No</th>
                                <th style="text-align:center; width:5%">No Transaksi</th>
                                <th style="text-align:center; width:20%">tanggal</th>
                                <th style="text-align:center; width:20%">Jenis Transaksi</th>
                                <th style="text-align:center; width:20%">Total Item</th>
                                <th style="text-align:center; width:20%">Total Nilai Transaksi</th>
                                <th style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/backend/laporan_transaksi.js') }}"></script>
@endpush

@endsection