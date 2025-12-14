<!-- Modal Form -->
<div class="modal fade" id="transaksiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="transaksiForm">
            @csrf

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <!-- ID untuk edit -->
                    <input type="hidden" name="id" id="transaksiId">

                    <!-- Jenis Transaksi -->
                    <div class="mb-3">
                        <label class="form-label">Jenis Transaksi</label>
                        <select name="jenis_transaksi" id="jenis_transaksi" class="form-control" required>
                            <option value="masuk">Masuk</option>
                            <option value="keluar">Keluar</option>
                        </select>
                    </div>

                    <!-- Tanggal -->
                    <div class="mb-3">
                        <label class="form-label">Tanggal Transaksi</label>
                        <input type="date" name="tgl_transaksi" id="tgl_transaksi" class="form-control" required>
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
                    </div>

                    <hr>

                    <!-- Item Barang -->
                    <h6 class="mb-3">Item Barang</h6>

                    <div id="itemWrapper">
                        <div class="item-row mb-3 p-3 border rounded">
                            <div class="row g-2">

                                <div class="col-md-4">
                                    <label>Barang</label>
                                    <select name="barang_id[]" class="form-control barang-select" required>
                                        <option value="">-- Pilih Barang --</option>
                                        @foreach ($barangs as $b)
                                            <option value="{{ $b->id }}" data-harga="{{ $b->harga_beli }}">
                                                {{ $b->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah[]" class="form-control jumlah" required>
                                </div>

                                <div class="col-md-3">
                                    <label>Harga</label>
                                    <input type="number" name="harga_satuan[]" class="form-control harga" readonly>
                                </div>

                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger btn-sm removeItem">
                                        <i class="ti ti-input-x"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- TEMPLATE KHUSUS (DISIMPAN, JANGAN DIHAPUS) -->
                    <div id="itemTemplate" class="d-none">
                        <div class="item-row mb-3 p-3 border rounded">
                            <div class="row g-2">

                                <div class="col-md-4">
                                    <label>Barang</label>
                                    <select class="form-control barang-select">
                                        <option value="">-- Pilih Barang --</option>
                                        @foreach ($barangs as $b)
                                            <option value="{{ $b->id }}" data-harga="{{ $b->harga_beli }}">
                                                {{ $b->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label>Jumlah</label>
                                    <input type="number" class="form-control jumlah">
                                </div>

                                <div class="col-md-3">
                                    <label>Harga</label>
                                    <input type="number" class="form-control harga" readonly>
                                </div>

                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger btn-sm removeItem">
                                        <i class="ti ti-input-x"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Tombol tambah item -->
                    <button type="button" id="addItem" class="btn btn-secondary btn-sm mt-2">
                        + Tambah Item
                    </button>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>

            </div>

        </form>
    </div>
</div>
