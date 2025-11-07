@extends('backend.template.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title fw-semibold">Manajemen Pengguna</h5>
                            <a href="#" class="btn btn-success btn-sm">
                                <i class="ti ti-plus me-2"></i>Tambah Pengguna
                            </a>
                        </div>

                        <table id="userTable" class="table table-striped table-bordered table-sm align-middle"
                            style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width:5%">No</th>
                                    <th class="text-center" style="width:20%">Nama</th>
                                    <th class="text-center" style="width:20%">Email</th>
                                    <th class="text-center" style="width:10%">Peran</th>
                                    <th class="text-center" style="width:10%">Status</th>
                                    <th class="text-center" style="width:15%">Dibuat</th>
                                    <th class="text-center" style="width:15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Admin Utama</td>
                                    <td>admin@example.com</td>
                                    <td class="text-center"><span class="badge bg-danger">Admin</span></td>
                                    <td class="text-center"><span class="badge bg-success">Aktif</span></td>
                                    <td class="text-center">01-11-2025</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm" title="Edit"><i
                                                class="ti ti-pencil"></i></a>
                                        <a href="#" class="btn btn-warning btn-sm" title="Reset Password"><i
                                                class="ti ti-lock"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" title="Hapus"><i
                                                class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>Editor Gudang</td>
                                    <td>editor@example.com</td>
                                    <td class="text-center"><span class="badge bg-primary">Editor</span></td>
                                    <td class="text-center"><span class="badge bg-success">Aktif</span></td>
                                    <td class="text-center">03-11-2025</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                        <a href="#" class="btn btn-warning btn-sm"><i class="ti ti-lock"></i></a>
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
                $('#userTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    lengthChange: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Cari pengguna..."
                    }
                });
            });
        </script>
    @endpush
@endsection
