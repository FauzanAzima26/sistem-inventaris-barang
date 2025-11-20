<!-- Modal Form -->
<div class="modal fade" id="kategoriModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="kategoriForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="uuid" id="kategoriId">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
