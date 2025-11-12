@extends('backend.template.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title fw-semibold">Data Barang</h5>
                            <a href="#" class="btn btn-success btn-sm" id="addBarang"><i class="ti ti-plus me-2"></i>Add
                                data</a>
                        </div>
                        <div class="table-responsif">
                            <table id="barangTable" class="table table-striped table-bordered" style="width:100%"
                                data-url="{{ route('barang.getData') }}">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Produk</th>
                                        <th style="text-align:center">Kategori</th>
                                        <th style="text-align:center">Harga Satuan</th>
                                        <th style="text-align:center">Jumlah</th>
                                        <th style="text-align:center">Satuan</th>
                                        <th style="text-align:center">Gambar</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--  --}}
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backend.barang._tambahData')

    @push('scripts')
        <script src="{{ asset('assets/js/barang.js') }}"></script>
    @endpush
@endsection
