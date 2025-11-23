<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <!-- Informasi Header -->
                <div class="mb-3">
                    <label class="fw-bold">Kode Transaksi:</label>
                    <div id="detail_kode"></div>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Jenis Transaksi:</label>
                    <div id="detail_jenis"></div>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Tanggal:</label>
                    <div id="detail_tanggal"></div>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Keterangan:</label>
                    <div id="detail_keterangan"></div>
                </div>

                <hr>

                <!-- Item Barang -->
                <h6 class="mb-3">Item Barang</h6>

                <div id="detailItemWrapper">

                    <!-- Akan diisi oleh JavaScript -->
                    <!-- Contoh item (JS akan generate ini)
                    <div class="item-row mb-3 p-3 border rounded">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <label>Barang</label>
                                <div>Nama Barang</div>
                            </div>
                            <div class="col-md-2">
                                <label>Jumlah</label>
                                <div>10</div>
                            </div>
                            <div class="col-md-3">
                                <label>Harga Satuan</label>
                                <div>Rp 12.000</div>
                            </div>
                            <div class="col-md-3">
                                <label>Subtotal</label>
                                <div>Rp 120.000</div>
                            </div>
                        </div>
                    </div>
                    -->

                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>
