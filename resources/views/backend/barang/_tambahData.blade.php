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
            @csrf
            <input id="barangId" type="hidden" />
            <div class="col-sm-12">
                <label class="form-label" for="basicFullname">Kode Barang</label>
                <div class="input-group input-group-merge">
                    <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                    <input
                        type="text"
                        id="basicFullname"
                        class="form-control kode_barang"
                        name="kode_barang"
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
                        class="form-control nama"
                        name="nama"
                        placeholder="John Doe"
                        aria-label="John Doe"
                        aria-describedby="basicFullname2" />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicFullname">Kategori</label>
                <div class="input-group input-group-merge">
                    <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                    <select
                        id="kategoriSelect"
                        name="kategori_id"
                        class="form-select kategori_id"
                        aria-describedby="kategoriSelect2">
                        <option value="" selected disabled>Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicSalary">Satuan</label>
                <div class="input-group input-group-merge">
                    <span id="basicSalary2" class="input-group-text"><i class="ti ti-currency-dollar"></i></span>
                    <input
                        type="number"
                        id="basicSalary"
                        name="satuan"
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
                        name="harga_beli"
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
                        type="file"
                        id="basicSalary"
                        name="image"
                        class="form-control image"
                        accept="image/*"
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