@extends('backend.template.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title fw-semibold">Laporan transaksi</h5>
                        </div>

                        <table id="kategoriTable" class="table table-striped table-bordered" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th style="text-align:center; width:5%">No Transaksi</th>
                                    <th style="text-align:center; width:20%">tanggal</th>
                                    <th style="text-align:center; width:20%">Jenis Transaksi</th>
                                    <th style="text-align:center; width:20%">Total Item</th>
                                    <th style="text-align:center; width:20%">Total Nilai Transaksi</th>
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

    @include('backend.laporan.laporanTransaksiDetail')

    @push('scripts')
        <script src="assets/js/laporan.js"></script>
    @endpush
@endsection
