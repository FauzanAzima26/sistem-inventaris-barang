<!-- Data Inventaris Section -->
<section id="menu" class="menu section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Data Inventaris</h2>
        <p><span>Kelola dan Pantau</span> <span class="description-title">Data Barang & Transaksi</span></p>
    </div><!-- End Section Title -->

    <div class="container">

        <!-- Tabs -->
        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">

            <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-barang">
                    <h4>Data Barang</h4>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-kategori">
                    <h4>Kategori</h4>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-transaksi">
                    <h4>Barang Masuk & Keluar</h4>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-laporan">
                    <h4>Laporan</h4>
                </a>
            </li>

        </ul>
        <!-- End Tabs -->

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

            <!-- =======================
          DATA BARANG
      ======================= -->
            <div class="tab-pane fade active show" id="menu-barang">
                <div class="tab-header text-center">
                    <h3>Data Barang</h3>
                    <p>Daftar barang beserta detail nama, kode, kategori, dan stok.</p>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($barangs as $i => $barang)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $barang->kode_barang }}</td>
                                    <td>{{ $barang->nama }}</td>
                                    <td>{{ $barang->kategori->nama ?? '-' }}</td>
                                    <td>{{ optional($barang->inventory)->stok ?? 0 }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Data barang belum tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div><!-- End Data Barang -->

            <!-- =======================
          KATEGORI
      ======================= -->
            <div class="tab-pane fade" id="menu-kategori">
                <div class="tab-header text-center">
                    <h3>Kategori Barang</h3>
                    <p>Pengelompokan barang berdasarkan jenis atau fungsi.</p>
                </div>
                @foreach ($categories as $k)
                    <div class="row gy-4">
                        <div class="col-lg-3 col-md-6 text-center">
                            <div class="card shadow-sm p-3 border-0">
                                <p>{{ $k->nama }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- End Kategori -->

            <!-- =======================
          BARANG MASUK & KELUAR
      ======================= -->
            <div class="tab-pane fade" id="menu-transaksi">
                <div class="tab-header text-center">
                    <h3>Barang Masuk & Keluar</h3>
                    <p>Aktivitas pemasukan dan pengeluaran barang secara real-time.</p>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Tanggal</th>
                                <th>Jenis Transaksi</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($transaksi as $i => $t)
                                @forelse ($t->items as $item)
                                    <tr>
                                        <td>{{ $loop->parent->iteration }}</td>
                                        <td>{{ $t->kode_transaksi }}</td>
                                        <td>{{ $t->tgl_transaksi }}</td>

                                        <td>
                                            <span
                                                class="badge bg-{{ $t->jenis_transaksi == 'masuk' ? 'success' : 'danger' }}">
                                                {{ ucfirst($t->jenis_transaksi) }}
                                            </span>
                                        </td>

                                        <td>{{ $item->barang->nama ?? '-' }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Tidak ada item pada transaksi ini</td>
                                    </tr>
                                @endforelse
                            @empty
                                <tr>
                                    <td colspan="7">Data transaksi belum tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div><!-- End Barang Masuk & Keluar -->

            <!-- =======================
              LAPORAN
          ======================= -->
            <div class="tab-pane fade" id="menu-laporan">
                <div class="tab-header text-center">
                    <h3>Laporan</h3>
                    <p>Tampilan ringkas laporan stok barang dan transaksi.</p>
                </div>

                <div class="d-flex justify-content-center mt-4 gap-2">
                    <button class="btn btn-outline-primary active" id="btn-stok">
                        <i class="bi bi-box-seam"></i> Laporan Stok
                    </button>
                    <button class="btn btn-outline-success" id="btn-transaksi">
                        <i class="bi bi-arrow-left-right"></i> Laporan Transaksi
                    </button>
                </div>

                <div id="laporan-stok" class="mt-4">

                    <div class="text-center mb-3">
                        <a href="{{ route('laporan.stok.pdf') }}"
                            class="btn btn-danger {{ $barangs->isEmpty() ? 'disabled' : '' }}">
                            <i class="bi bi-file-earmark-pdf"></i> Ekspor PDF
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered align-middle">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Stok Akhir</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($barangs as $index => $barang)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $barang->kode_barang }}</td>
                                        <td>{{ $barang->nama }}</td>
                                        <td>{{ $barang->kategori->nama ?? '-' }}</td>
                                        <td>{{ $barang->inventory->stok ?? 0 }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-muted py-4">
                                            <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                                            Data stok barang belum tersedia
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

                <div id="laporan-transaksi" class="mt-4 d-none">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered align-middle">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Kode Transaksi</th>
                                    <th>Jenis</th>
                                    <th>Total Item</th>
                                    <th>Download</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @forelse ($transaksi as $index => $trx)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $trx->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $trx->kode_transaksi }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $trx->jenis_transaksi === 'masuk' ? 'success' : 'danger' }}">
                                                {{ ucfirst($trx->jenis_transaksi) }}
                                            </span>
                                        </td>
                                        <td>{{ $trx->items->count() }}</td>
                                        <td>
                                            <a href="{{ route('laporan.transaksi.pdf', $trx->uuid) }}"
                                                class="btn btn-sm btn-danger">
                                                <i class="bi bi-file-earmark-pdf"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-muted py-4">
                                            <i class="bi bi-receipt fs-4 d-block mb-2"></i>
                                            Data transaksi belum tersedia
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>

                </div>

            </div><!-- End Laporan -->

        </div>

    </div>

    <script>
        const btnStok = document.getElementById('btn-stok');
        const btnTransaksi = document.getElementById('btn-transaksi');
        const laporanStok = document.getElementById('laporan-stok');
        const laporanTransaksi = document.getElementById('laporan-transaksi');

        btnStok.addEventListener('click', () => {
            laporanStok.classList.remove('d-none');
            laporanTransaksi.classList.add('d-none');
            btnStok.classList.add('active');
            btnTransaksi.classList.remove('active');
        });

        btnTransaksi.addEventListener('click', () => {
            laporanTransaksi.classList.remove('d-none');
            laporanStok.classList.add('d-none');
            btnTransaksi.classList.add('active');
            btnStok.classList.remove('active');
        });
    </script>

</section><!-- /Data Inventaris Section -->
