@extends('backend.template.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title fw-semibold">Management User</h5>

                            <div class="d-flex gap-2">
                                <a class="btn btn-success btn-sm" id="addUser">
                                    <i class="ti ti-plus me-1"></i> Tambah User
                                </a>

                                <a class="btn btn-danger btn-sm" id="btnSampahUser">
                                    <i class="ti ti-trash me-1"></i> Baru Saja Dihapus
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="userTable" class="table table-striped table-bordered" style="width:100%"
                                data-url="{{ route('managemen-user.getdata') }}">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Tanggal Dibuat</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- AJAX --}}
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backend.management-user.addUser')

    @push('scripts')
        <script src="{{ asset('assets/js/managementUser.js') }}"></script>
    @endpush
@endsection
