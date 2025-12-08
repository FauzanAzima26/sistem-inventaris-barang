<!-- ============================
     MODAL DETAIL TRANSAKSI
=============================== -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <!-- ===== HEADER TRANSAKSI ===== -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>No Transaksi:</strong> <span id="detail_no"></span></p>
                        <p><strong>Tanggal:</strong> <span id="detail_tanggal"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Jenis Transaksi:</strong> <span id="detail_jenis"></span></p>
                        <p><strong>Keterangan:</strong> <span id="detail_keterangan"></span></p>
                    </div>
                </div>

                <hr>

                <!-- ===== DETAIL ITEM ===== -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="detailItemTable">
                        <thead class="table-light">
                            <tr>
                                <th style="width:5%; text-align:center">No</th>
                                <th style="width:20%; text-align:center">Nama Barang</th>
                                <th style="width:15%; text-align:center">Kode</th>
                                <th style="width:10%; text-align:center">Qty</th>
                                <th style="width:15%; text-align:center">Harga</th>
                                <th style="width:15%; text-align:center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- AJAX LOAD -->
                        </tbody>
                    </table>
                </div>

                <div class="text-end mt-3">
                    <h5><strong>Total Nilai Transaksi: </strong> <span id="detail_total"></span></h5>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>
