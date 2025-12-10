@extends('backend.template.main')

@section('content')
    <div class="container-fluid">

        <!-- Statistik Ringkas -->
        <div class="row">
            <!-- Jumlah Barang -->
            <div class="col-md-3">
                <div class="card border-left-primary shadow-sm">
                    <div class="card-body">
                        <h5 class="text-primary fw-bold">Barang</h5>
                        <h3 class="fw-semibold">{{ $barangCount ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <!-- Kategori -->
            <div class="col-md-3">
                <div class="card border-left-success shadow-sm">
                    <div class="card-body">
                        <h5 class="text-success fw-bold">Kategori</h5>
                        <h3 class="fw-semibold">{{ $kategoriCount ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <!-- Transaksi Masuk -->
            <div class="col-md-3">
                <div class="card border-left-info shadow-sm">
                    <div class="card-body">
                        <h5 class="text-info fw-bold">Transaksi Masuk</h5>
                        <h3 class="fw-semibold">{{ $transaksiMasukCount ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <!-- Transaksi Keluar -->
            <div class="col-md-3">
                <div class="card border-left-danger shadow-sm">
                    <div class="card-body">
                        <h5 class="text-danger fw-bold">Transaksi Keluar</h5>
                        <h3 class="fw-semibold">{{ $transaksiKeluarCount ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stok Menipis -->
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="fw-semibold">📉 Stok Menipis</h4>
                        <p class="text-muted">Daftar barang dengan stok <strong>≤ 5</strong></p>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama</th>
                                    <th>Stok</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stokMenipis ?? [] as $item)
                                    <tr>
                                        <td>{{ $item->barang->kode_barang }}</td>
                                        <td>{{ $item->barang->nama }}</td>
                                        <td><span class="badge bg-danger">{{ $item->stok }}</span></td>
                                        <td>{{ $item->barang->kategori->nama }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            Tidak ada stok menipis 👌
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
