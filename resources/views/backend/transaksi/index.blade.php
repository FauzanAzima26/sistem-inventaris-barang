@extends('backend.template.main')

@section('content')
    <style>
        /* Ukuran font seragam dan lebih kecil */
        #transaksiTable {
            font-size: 0.875rem;
            /* ~14px */
        }

        #transaksiTable thead th {
            font-weight: 600;
            vertical-align: middle;
        }

        #transaksiTable tbody td {
            vertical-align: middle;
        }

        /* Perkecil tombol aksi */
        .btn-sm i {
            font-size: 0.85rem;
        }

        /* Supaya badge tetap proporsional */
        .badge {
            font-size: 0.75rem;
            padding: 0.4em 0.6em;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title fw-semibold mb-0">Transaksi Masuk</h5>
                            <a href="#" class="btn btn-success btn-sm" id="addTransaksi">
                                <i class="ti ti-plus me-2"></i>Tambah Transaksi
                            </a>
                        </div>

                        <table id="transaksiTable" class="table table-striped table-bordered table-sm align-middle"
                            style="width:100%" data-url="{{ route('transaksi.getData') }}">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width:5%">No</th>
                                    <th class="text-center" style="width:15%">No Transaksi</th>
                                    <th class="text-center" style="width:10%">Tanggal</th>
                                    <th class="text-center" style="width:10%">Jenis</th>
                                    <th class="text-center" style="width:10%">Total Item</th>
                                    <th class="text-center" style="width:10%">Keterangan</th>
                                    <th class="text-center" style="width:15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backend.transaksi._tambahData')

    @include('backend.transaksi._itemDetail')

    @push('scripts')
        <script>
            window.allBarangs = @json($barangs);
        </script>
        <script src="{{ asset('assets/js/transaksi.js') }}"></script>
    @endpush
@endsection
