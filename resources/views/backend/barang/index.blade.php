@extends('backend.template.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title fw-semibold">Data Barang</h5>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-success btn-sm" id="addBarang">
                                        <i class="ti ti-plus me-1"></i> Tambah Data
                                    </a>

                                    <a class="btn btn-danger btn-sm" id="btnSampahBarang">
                                        <i class="ti ti-trash me-1"></i> Baru Saja Dihapus
                                    </a>
                                </div>
                        </div>
                        <div class="table-responsif">
                            <table id="barangTable" class="table table-striped table-bordered" style="width:100%"
                                data-url="{{ route('barang.getData') }}">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Kode barang</th>
                                        <th style="text-align:center">Produk</th>
                                        <th style="text-align:center">Kategori</th>
                                        <th style="text-align:center">Satuan</th>
                                        <th style="text-align:center">Harga beli</th>
                                        <th style="text-align:center">Gambar</th>
                                        <th style="text-align:center;">Action</th>
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
    </div>

    @include('backend.barang._tambahData')

    @include('backend.barang.BaruDihapus')

    @push('scripts')
        <script>
            const USER_ROLE = "{{ Auth::user()->role }}";
        </script>

        <script src="{{ asset('assets/js/barang.js') }}"></script>
    @endpush
@endsection
