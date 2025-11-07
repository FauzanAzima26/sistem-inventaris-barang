@extends('backend.template.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title fw-semibold">Kategori Barang</h5>
                            <a href="#" class="btn btn-success btn-sm">
                                <i class="ti ti-plus me-2"></i>Tambah Data
                            </a>
                        </div>

                        <table id="kategoriTable" class="table table-striped table-bordered" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th style="text-align:center; width:5%">No</th>
                                    <th style="text-align:center; width:20%">Kategori</th>
                                    <th style="text-align:center; width:35%">Deskripsi</th>
                                    <th style="text-align:center; width:15%">Status</th>
                                    <th style="text-align:center; width:15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Elektronik</td>
                                    <td class="text-center">Barang-barang elektronik seperti laptop, HP, dan TV</td>
                                    <td class="text-center">
                                        <span class="badge bg-success">Aktif</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">Alat Tulis</td>
                                    <td class="text-center">Barang keperluan kantor seperti pulpen, kertas, dan map</td>
                                    <td class="text-center">
                                        <span class="badge bg-success">Aktif</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">Bahan Bangunan</td>
                                    <td class="text-center">Semen, cat, besi, paku, dan bahan konstruksi lainnya</td>
                                    <td class="text-center">
                                        <span class="badge bg-danger">Nonaktif</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="text-center">Furnitur</td>
                                    <td class="text-center">Perabotan kantor dan rumah seperti meja, kursi, dan lemari</td>
                                    <td class="text-center">
                                        <span class="badge bg-success">Aktif</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="text-center">Aksesoris</td>
                                    <td class="text-center">Barang pelengkap seperti kabel, charger, casing, dan adaptor</td>
                                    <td class="text-center">
                                        <span class="badge bg-success">Aktif</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>
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
                console.log("jQuery:", $.fn.jquery);
                console.log("DataTables:", typeof $.fn.DataTable);

                $('#kategoriTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    lengthChange: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Cari kategori..."
                    }
                });
            });
        </script>
    @endpush
@endsection
