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
                            <tr>
                                <td>1</td>
                                <td>BRG-001</td>
                                <td>Laptop Lenovo Thinkpad</td>
                                <td>Elektronik</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>BRG-002</td>
                                <td>Kursi Kantor</td>
                                <td>Furnitur</td>
                                <td>25</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>BRG-003</td>
                                <td>Printer Canon</td>
                                <td>Elektronik</td>
                                <td>8</td>
                            </tr>
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

                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="card shadow-sm p-3 border-0">
                            <h5 class="fw-bold">Elektronik</h5>
                            <p>Perangkat elektronik seperti laptop, printer, dan proyektor.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="card shadow-sm p-3 border-0">
                            <h5 class="fw-bold">Furnitur</h5>
                            <p>Perabot kantor seperti meja, kursi, dan lemari.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="card shadow-sm p-3 border-0">
                            <h5 class="fw-bold">ATK</h5>
                            <p>Alat tulis dan keperluan administrasi kantor.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="card shadow-sm p-3 border-0">
                            <h5 class="fw-bold">Lainnya</h5>
                            <p>Barang umum yang tidak termasuk kategori utama.</p>
                        </div>
                    </div>
                </div>
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
                                <th>Petugas</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>1</td>
                                <td>TRX-20251108-001</td>
                                <td>08-11-2025</td>
                                <td><span class="badge bg-success">Masuk</span></td>
                                <td>Laptop Lenovo Thinkpad</td>
                                <td>5</td>
                                <td>Admin Gudang</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>TRX-20251108-002</td>
                                <td>08-11-2025</td>
                                <td><span class="badge bg-danger">Keluar</span></td>
                                <td>Kursi Kantor</td>
                                <td>3</td>
                                <td>Staff Gudang</td>
                            </tr>
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
                    <p>Tampilan ringkas data stok dan transaksi yang dapat diunduh atau dicetak.</p>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-primary me-2">
                        <i class="bi bi-file-earmark-pdf"></i> Unduh PDF
                    </button>
                    <button class="btn btn-success">
                        <i class="bi bi-file-earmark-excel"></i> Unduh Excel
                    </button>
                </div>

                <div class="table-responsive mt-4">
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
                            <tr>
                                <td>1</td>
                                <td>BRG-001</td>
                                <td>Laptop Lenovo Thinkpad</td>
                                <td>Elektronik</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>BRG-002</td>
                                <td>Kursi Kantor</td>
                                <td>Furnitur</td>
                                <td>22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- End Laporan -->

        </div>

    </div>
</section><!-- /Data Inventaris Section -->
