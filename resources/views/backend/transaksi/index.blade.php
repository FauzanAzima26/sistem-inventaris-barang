@extends('backend.template.main')

@section('content')
<style>
    /* Ukuran font seragam dan lebih kecil */
    #transaksiTable {
        font-size: 0.875rem; /* ~14px */
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
                        <h5 class="card-title fw-semibold mb-0">Manajemen Transaksi Barang</h5>
                        <a href="#" class="btn btn-success btn-sm">
                            <i class="ti ti-plus me-2"></i>Tambah Transaksi
                        </a>
                    </div>

                    <table id="transaksiTable" class="table table-striped table-bordered table-sm align-middle" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" style="width:5%">No</th>
                                <th class="text-center" style="width:20%">Kode Transaksi</th>
                                <th class="text-center" style="width:15%">Tanggal</th>
                                <th class="text-center" style="width:10%">Jenis</th>
                                <th class="text-center" style="width:10%">Total Item</th>
                                <th class="text-center" style="width:15%">Total Nilai</th>
                                <th class="text-center" style="width:10%">Petugas</th>
                                <th class="text-center" style="width:15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">TRX-20251108-001</td>
                                <td class="text-center">08-11-2025</td>
                                <td class="text-center">
                                    <span class="badge bg-success">Barang Masuk</span>
                                </td>
                                <td class="text-center">5</td>
                                <td class="text-center">Rp 2.500.000</td>
                                <td class="text-center">Admin Gudang</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info btn-sm" title="Detail"><i class="ti ti-eye"></i></a>
                                    <a href="#" class="btn btn-primary btn-sm" title="Edit"><i class="ti ti-pencil"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" title="Hapus"><i class="ti ti-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="text-center">TRX-20251108-002</td>
                                <td class="text-center">08-11-2025</td>
                                <td class="text-center">
                                    <span class="badge bg-danger">Barang Keluar</span>
                                </td>
                                <td class="text-center">3</td>
                                <td class="text-center">Rp 850.000</td>
                                <td class="text-center">Staff Gudang</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info btn-sm" title="Detail"><i class="ti ti-eye"></i></a>
                                    <a href="#" class="btn btn-primary btn-sm" title="Edit"><i class="ti ti-pencil"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" title="Hapus"><i class="ti ti-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="text-center">TRX-20251108-003</td>
                                <td class="text-center">07-11-2025</td>
                                <td class="text-center">
                                    <span class="badge bg-success">Barang Masuk</span>
                                </td>
                                <td class="text-center">8</td>
                                <td class="text-center">Rp 4.100.000</td>
                                <td class="text-center">Admin Gudang</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info btn-sm" title="Detail"><i class="ti ti-eye"></i></a>
                                    <a href="#" class="btn btn-primary btn-sm" title="Edit"><i class="ti ti-pencil"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" title="Hapus"><i class="ti ti-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#transaksiTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            lengthChange: true,
            order: [[2, 'desc']],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari transaksi..."
            }
        });
    });
</script>
@endpush
@endsection
