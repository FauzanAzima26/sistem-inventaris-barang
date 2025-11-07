@extends('backend.template.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title fw-semibold">Data Barang</h5>
                            <a href="#" class="btn btn-success btn-sm"><i class="ti ti-plus me-2"></i>Add data</a>
                        </div>

                        <table id="salesTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center">No</th>
                                    <th style="text-align:center">Product</th>
                                    <th style="text-align:center">Category</th>
                                    <th style="text-align:center">Price</th>
                                    <th style="text-align:center">Sold</th>
                                    <th style="text-align:center">Total Revenue</th>
                                    <th style="width: 15%; text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Smartphone X</td>
                                    <td class="text-center">Electronics</td>
                                    <td class="text-center">$500</td>
                                    <td class="text-center">120</td>
                                    <td class="text-center">$60,000</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">Laptop Pro</td>
                                    <td class="text-center">Electronics</td>
                                    <td class="text-center">$1200</td>
                                    <td class="text-center">45</td>
                                    <td class="text-center">$54,000</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">Headphones</td>
                                    <td class="text-center">Accessories</td>
                                    <td class="text-center">$150</td>
                                    <td class="text-center">300</td>
                                    <td class="text-center">$45,000</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="text-center">Office Chair</td>
                                    <td class="text-center">Furniture</td>
                                    <td class="text-center">$200</td>
                                    <td class="text-center">50</td>
                                    <td class="text-center">$10,000</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="text-center">Smartwatch</td>
                                    <td class="text-center">Electronics</td>
                                    <td class="text-center">$250</td>
                                    <td class="text-center">100</td>
                                    <td class="text-center">$25,000</td>
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

                $('#salesTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    lengthChange: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Cari data barang..."
                    }
                });
            });
        </script>
    @endpush
@endsection
