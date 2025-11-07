@extends('backend.template.main')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title fw-semibold">Laporan Stok Barang</h5>
                    <div>
                        <a href="#" class="btn btn-danger btn-sm">
                            <i class="ti ti-file-type-pdf me-1"></i> PDF
                        </a>
                        <a href="#" class="btn btn-success btn-sm">
                            <i class="ti ti-file-spreadsheet me-1"></i> Excel
                        </a>
                    </div>
                </div>

                <table id="laporanTable" class="table table-striped table-bordered align-middle" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th class="text-center" width="15%">Kode Barang</th>
                            <th class="text-center" width="20%">Nama Barang</th>
                            <th class="text-center" width="10%">Masuk</th>
                            <th class="text-center" width="10%">Keluar</th>
                            <th class="text-center" width="10%">Sisa</th>
                            <th class="text-center" width="15%">Nilai Total</th>
                            <th class="text-center" width="15%">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">BRG-001</td>
                            <td>Monitor 24 Inch</td>
                            <td class="text-center">10</td>
                            <td class="text-center">3</td>
                            <td class="text-center">7</td>
                            <td class="text-center">Rp 10.500.000</td>
                            <td class="text-center">Stok Aman</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-center">BRG-002</td>
                            <td>Keyboard Mechanical</td>
                            <td class="text-center">20</td>
                            <td class="text-center">18</td>
                            <td class="text-center">2</td>
                            <td class="text-center">Rp 2.400.000</td>
                            <td class="text-center text-danger">Stok Rendah</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#laporanTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    order: [
                        [1, 'asc']
                    ],
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Cari barang..."
                    }
                });
            });
        </script>
    @endpush
@endsection
