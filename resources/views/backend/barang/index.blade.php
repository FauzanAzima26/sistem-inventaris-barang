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
                            <i class="ti ti-packages ti-md"></i>
                        </span>

                        <h5 class="card-title mb-0 fw-semibold">
                            Barang
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
                                <th style="text-align:center">Kode barang</th>
                                <th style="text-align:center">Produk</th>
                                <th style="text-align:center">Kategori</th>
                                <th style="text-align:center">Satuan</th>
                                <th style="text-align:center">Harga beli</th>
                                <th style="text-align:center">Gambar</th>
                                <th style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            @include('backend.barang._tambahData')
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/backend/barang.js') }}"></script>
@endpush

@endsection