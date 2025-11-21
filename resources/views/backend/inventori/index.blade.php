@extends('backend.template.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title fw-semibold">Inventori</h5>
                            <a class="btn btn-success btn-sm" id="addInventory"><i class="ti ti-plus me-2"></i>Tambah
                                data</a>
                        </div>
                        <div class="table-responsif">
                            <table id="inventoryTable" class="table table-striped table-bordered" style="width:100%"
                                data-url="{{ route('inventory.getData') }}">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Produk</th>
                                        <th style="text-align:center">Stok</th>
                                        <th style="text-align:center">Satuan</th>
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

    @include('backend.inventori._tambahData')

    @push('scripts')
        <script src="{{ asset('assets/js/inventory.js') }}"></script>
    @endpush
@endsection
