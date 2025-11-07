@extends('backend.template.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title fw-semibold">Pengaturan Sistem</h5>
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="ti ti-settings me-1"></i> Simpan Perubahan
                            </a>
                        </div>

                        <table id="pengaturanTable" class="table table-bordered align-middle" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">No</th>
                                    <th class="text-center" width="25%">Nama Pengaturan</th>
                                    <th class="text-center" width="35%">Nilai</th>
                                    <th class="text-center" width="25%">Deskripsi</th>
                                    <th class="text-center" width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Nama Instansi</td>
                                    <td>PT. Maju Bersama</td>
                                    <td>Nama lembaga atau perusahaan pengguna sistem</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>Lokasi Penyimpanan</td>
                                    <td>Gudang Utama Jakarta</td>
                                    <td>Lokasi fisik tempat penyimpanan barang</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>Logo Sistem</td>
                                    <td><img src="/assets/images/logo.png" alt="Logo" height="35"></td>
                                    <td>Logo yang tampil di dashboard</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-secondary btn-sm"><i class="ti ti-upload"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>Tema Dashboard</td>
                                    <td>Default</td>
                                    <td>Warna utama tampilan dashboard</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-palette"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td>Format Tanggal</td>
                                    <td>DD-MM-YYYY</td>
                                    <td>Format tanggal pada tampilan data</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
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
                $('#pengaturanTable').DataTable({
                    paging: false,
                    searching: false,
                    ordering: false,
                    info: false
                });
            });
        </script>
    @endpush
@endsection
