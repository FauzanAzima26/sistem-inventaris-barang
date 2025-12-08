@extends('backend.template.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title fw-semibold">Laporan Stok</h5>
                        </div>

                        <table id="kategoriTable" class="table table-striped table-bordered" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th style="text-align:center; width:5%">Kode Barang</th>
                                    <th style="text-align:center; width:20%">Nama Barang</th>
                                    <th style="text-align:center; width:20%">Kategori</th>
                                    <th style="text-align:center; width:20%">Harga Satuan</th>
                                    <th style="text-align:center; width:20%">Stok Masuk</th>
                                    <th style="text-align:center; width:20%">Stok Keluar</th>
                                    <th style="text-align:center; width:20%">Stok Akhir</th>
                                    <th style="text-align:center; width:20%">Satuan</th>
                                    <th style="text-align:center; width:15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- ajax --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="assets/js/laporanStok.js"></script>
    @endpush
@endsection
