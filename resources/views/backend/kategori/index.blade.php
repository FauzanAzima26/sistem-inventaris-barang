@extends('backend.layouts.main')

@section('content')
<div class="container-fluid">
    <!-- Stok Menipis -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <!-- Pindahkan judul ke Card Header agar tata letak konsisten -->
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-label-warning p-2 rounded">
                            <i class="ti ti-tag ti-sm"></i>
                        </span>

                        <h5 class="card-title mb-0 fw-semibold">
                            Kategori
                        </h5>
                    </div>
                </div>
                <div class="card-datatable table-responsive pt-0">
                    <table class="table border-top" id="kategoriTable">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="text-center" width="8%">No</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="offcanvas offcanvas-end" id="add-new-record">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                    <button
                        type="button"
                        class="btn-close text-reset"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body flex-grow-1">
                    <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
                        <div class="col-sm-12">
                            <label class="form-label" for="basicFullname">Full Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                                <input
                                    type="text"
                                    id="basicFullname"
                                    class="form-control dt-full-name"
                                    name="basicFullname"
                                    placeholder="John Doe"
                                    aria-label="John Doe"
                                    aria-describedby="basicFullname2" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="basicPost">Post</label>
                            <div class="input-group input-group-merge">
                                <span id="basicPost2" class="input-group-text"><i class="ti ti-briefcase"></i></span>
                                <input
                                    type="text"
                                    id="basicPost"
                                    name="basicPost"
                                    class="form-control dt-post"
                                    placeholder="Web Developer"
                                    aria-label="Web Developer"
                                    aria-describedby="basicPost2" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="basicEmail">Email</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-mail"></i></span>
                                <input
                                    type="text"
                                    id="basicEmail"
                                    name="basicEmail"
                                    class="form-control dt-email"
                                    placeholder="john.doe@example.com"
                                    aria-label="john.doe@example.com" />
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="basicDate">Joining Date</label>
                            <div class="input-group input-group-merge">
                                <span id="basicDate2" class="input-group-text"><i class="ti ti-calendar"></i></span>
                                <input
                                    type="text"
                                    class="form-control dt-date"
                                    id="basicDate"
                                    name="basicDate"
                                    aria-describedby="basicDate2"
                                    placeholder="MM/DD/YYYY"
                                    aria-label="MM/DD/YYYY" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="basicSalary">Salary</label>
                            <div class="input-group input-group-merge">
                                <span id="basicSalary2" class="input-group-text"><i class="ti ti-currency-dollar"></i></span>
                                <input
                                    type="number"
                                    id="basicSalary"
                                    name="basicSalary"
                                    class="form-control dt-salary"
                                    placeholder="12000"
                                    aria-label="12000"
                                    aria-describedby="basicSalary2" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/backend/kategori.js') }}"></script>
@endpush

@endsection