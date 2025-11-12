<!-- Modal Form -->
<div class="modal fade" id="barangModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="barangForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="barangId">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Satuan</label>
                        <input type="text" name="satuan" id="satuan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Satuan</label>
                        <input type="file" name="image" id="image" class="form-control">
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
