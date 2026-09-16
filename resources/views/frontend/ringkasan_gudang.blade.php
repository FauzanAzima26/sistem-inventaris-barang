<section id="landingRingkasan" class="section-py landing-fun-facts" style="scroll-margin-top: 80px;">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <g fill="none" stroke="#7367f0" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.6">
                                    <path d="m7 16.5l-5-3l5-3l5 3V19l-5 3z" />
                                    <path d="M2 13.5V19l5 3m0-5.455l5-3.03m5 2.985l-5-3l5-3l5 3V19l-5 3zM12 19l5 3m0-5.5l5-3m-10 0V8L7 5l5-3l5 3v5.5M7 5.03v5.455M12 8l5-3" />
                                </g>
                            </svg>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <g fill="none" stroke="#7367f0" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.6">
                                    <path d="M6.5 7.5a1 1 0 1 0 2 0a1 1 0 1 0-2 0" />
                                    <path d="M3 6v5.172a2 2 0 0 0 .586 1.414l7.71 7.71a2.41 2.41 0 0 0 3.408 0l5.592-5.592a2.41 2.41 0 0 0 0-3.408l-7.71-7.71A2 2 0 0 0 11.172 3H6a3 3 0 0 0-3 3" />
                                </g>
                            </svg>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <g fill="none" stroke="#7367f0" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.6">
                                <path d="M3 21V8l9-4l9 4v13" />
                                <path d="M13 13h4v8H7v-6h6" />
                                <path d="M13 21v-9a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v3" />
                            </g>
                        </svg>
                        <h3 class="fw-bold mb-1">{{ $totalSupplier ?? 0 }}</h3>
                        <p class="fw-medium text-muted small mb-0">Mitra Supplier</p>
                    </div>
                </div>
            </div>

            <!-- 4. Total Transaksi Bulan Ini -->
            <div class="col-sm-6 col-lg-3">
                <div class="card border border-warning shadow-none h-100">
                    <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path fill="none" stroke="#7367f0" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.6" d="M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16l-3-2l-2 2l-2-2l-2 2l-2-2zM9 7h6m-6 4h6m-2 4h2" />
                        </svg>
                        <h3 class="fw-bold mb-1">{{ $totalTransaksiBulanIni ?? 0 }}</h3>
                        <p class="fw-medium text-muted small mb-0">Transaksi Bulan Ini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>