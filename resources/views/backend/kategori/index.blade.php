@extends('backend.template.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title fw-semibold">Kategori</h5>
                            <div class="d-flex gap-2">
                                <a class="btn btn-success btn-sm" id="addKategori">
                                    <i class="ti ti-plus me-1"></i> Tambah Data
                                </a>
                                <a class="btn btn-danger btn-sm" id="btnSampahKategori">
                                    <i class="ti ti-trash me-1"></i> Baru Saja Dihapus
                                </a>
                            </div>
                        </div>

                        <table id="kategoriTable" class="table table-striped table-bordered" style="width:100%"
                            data-url="{{ route('kategori.getData') }}">
                            <thead class="table-light">
                                <tr>
                                    <th style="text-align:center; width:5%">No</th>
                                    <th style="text-align:center; width:20%">Kategori</th>
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

    @include('backend.kategori._tambahData')

    @include('backend.kategori.BaruDihapus')

    @push('scripts')
        <script src="{{ asset('assets/js/category.js') }}"></script>
    @endpush
@endsection
