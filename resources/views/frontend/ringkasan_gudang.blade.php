<section id="landingFunFacts" class="section-py landing-fun-facts">
    <div class="container">
        <!-- Judul Bagian -->
        <h4 class="text-center mb-1">
            <span class="position-relative fw-extrabold z-1">Metrik Ringkas Gudang
                <img
                    src="../../assets/img/front-pages/icons/section-title-icon.png"
                    alt="section title icon"
                    class="section-title-img position-absolute object-fit-contain bottom-0 z-n1" />
            </span>
        </h4>
        <p class="text-center text-muted mb-12">
            Statistik berjalan sirkulasi dan status aset inventaris secara real-time.
        </p>

        <!-- Baris Kartu Statistik -->
        <div class="row g-4">
            <!-- 1. Total Ragam Barang -->
            <div class="col-sm-6 col-lg-3">
                <div class="card border border-info shadow-none h-100">
                    <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-3 text-info fs-1">
                            <img src="{{ asset ('assets/emojis/package_3d.png') }}" alt="Total Barang" style="width: 70px; height: 70px;">
                        </div>
                        <h3 class="fw-bold mb-1">{{ $totalBarang ?? 0 }}</h3>
                        <p class="fw-medium text-muted small mb-0">Total Item Barang</p>
                    </div>
                </div>
            </div>

            <!-- 2. Kategori Terdaftar -->
            <div class="col-sm-6 col-lg-3">
                <div class="card border border-primary shadow-none h-100">
                    <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-3 text-primary fs-1">
                            <img src="{{ asset ('assets/emojis/label_3d.png') }}" alt="Total Barang" style="width: 70px; height: 70px;">
                        </div>
                        <h3 class="fw-bold mb-1">{{ $totalKategori ?? 0 }}</h3>
                        <p class="fw-medium text-muted small mb-0">Kategori Terdaftar</p>
                    </div>
                </div>
            </div>

            <!-- 3. Mitra Supplier / Klien -->
            <div class="col-sm-6 col-lg-3">
                <div class="card border border-success shadow-none h-100">
                    <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-3 text-success fs-1">🤝</div>
                        <h3 class="fw-bold mb-1">{{ $totalSupplier ?? 0 }}</h3>
                        <p class="fw-medium text-muted small mb-0">Mitra Supplier</p>
                    </div>
                </div>
            </div>

            <!-- 4. Total Transaksi Bulan Ini -->
            <div class="col-sm-6 col-lg-3">
                <div class="card border border-warning shadow-none h-100">
                    <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-3 text-warning fs-1">🔄</div>
                        <h3 class="fw-bold mb-1">{{ $totalTransaksiBulanIni ?? 0 }}</h3>
                        <p class="fw-medium text-muted small mb-0">Transaksi Bulan Ini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>