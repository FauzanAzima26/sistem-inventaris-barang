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
            <input id="barangId" type="hidden" />
            <div class="col-sm-12">
                <label class="form-label" for="basicFullname">Kode Barang</label>
                <div class="input-group input-group-merge">
                    <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                    <input
                        type="text"
                        id="basicFullname"
                        class="form-control kode_barang"
                        name="basicFullname"
                        placeholder="John Doe"
                        aria-label="John Doe"
                        aria-describedby="basicFullname2" />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicFullname">Produk</label>
                <div class="input-group input-group-merge">
                    <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                    <input
                        type="text"
                        id="basicFullname"
                        class="form-control produk"
                        name="basicFullname"
                        placeholder="John Doe"
                        aria-label="John Doe"
                        aria-describedby="basicFullname2" />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicFullname">Kategori</label>
                <div class="input-group input-group-merge">
                    <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                    <input
                        type="text"
                        id="basicFullname"
                        class="form-control kategori_id"
                        name="basicFullname"
                        placeholder="John Doe"
                        aria-label="John Doe"
                        aria-describedby="basicFullname2" />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicSalary">Satuan</label>
                <div class="input-group input-group-merge">
                    <span id="basicSalary2" class="input-group-text"><i class="ti ti-currency-dollar"></i></span>
                    <input
                        type="number"
                        id="basicSalary"
                        name="basicSalary"
                        class="form-control satuan"
                        placeholder="12000"
                        aria-label="12000"
                        aria-describedby="basicSalary2" />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicSalary">Harga Beli</label>
                <div class="input-group input-group-merge">
                    <span id="basicSalary2" class="input-group-text"><i class="ti ti-currency-dollar"></i></span>
                    <input
                        type="number"
                        id="basicSalary"
                        name="basicSalary"
                        class="form-control harga_beli"
                        placeholder="12000"
                        aria-label="12000"
                        aria-describedby="basicSalary2" />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicSalary">Image</label>
                <div class="input-group input-group-merge">
                    <span id="basicSalary2" class="input-group-text"><i class="ti ti-currency-dollar"></i></span>
                    <input
                        type="number"
                        id="basicSalary"
                        name="basicSalary"
                        class="form-control image"
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