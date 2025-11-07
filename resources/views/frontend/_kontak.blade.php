<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p><span>Perlu Bantuan?</span> <span class="description-title">Hubungi Pengelola Inventaris</span></p>
        <p class="text-muted mt-2">
            Gunakan formulir ini untuk mengajukan permintaan data, melaporkan masalah, atau berkomunikasi langsung dengan tim pengelola inventaris.
        </p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Google Maps Lokasi Gudang -->
        <div class="mb-5">
            <iframe
                style="width: 100%; height: 400px; border:0;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.107425746224!2d110.36569947498791!3d-7.871273278478343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a577b8b1e4a4d%3A0x6f19b77b12dfb4c0!2sGudang%20Inventaris%20PT.%20Maju%20Bersama!5e0!3m2!1sid!2sid!4v1731052032134"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div><!-- End Google Maps -->

        <!-- Informasi Kontak -->
        <div class="row gy-4">
            <div class="col-md-6">
                <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h3>Alamat Gudang</h3>
                        <p>Jl. Industri No. 12, Sleman, Yogyakarta, Indonesia</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                    <i class="icon bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Telepon Pengelola</h3>
                        <p>+62 812 3456 7890</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                    <i class="icon bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Resmi</h3>
                        <p>inventaris@ptmaju.co.id</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
                    <i class="icon bi bi-clock flex-shrink-0"></i>
                    <div>
                        <h3>Jam Operasional</h3>
                        <p><strong>Senin–Jumat:</strong> 08.00 – 17.00 <br><strong>Sabtu–Minggu:</strong> Tutup</p>
                    </div>
                </div>
            </div><!-- End Info Item -->
        </div>

        <!-- Formulir Kontak -->
        <form action="#" method="post" class="php-email-form mt-4" data-aos="fade-up" data-aos-delay="600">
            @csrf
            <div class="row gy-4">

                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Nama Anda" required="">
                </div>

                <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="Email Anda" required="">
                </div>

                <div class="col-md-12">
                    <input type="text" name="subject" class="form-control" placeholder="Subjek Pesan" required="">
                </div>

                <div class="col-md-12">
                    <textarea name="message" class="form-control" rows="6" placeholder="Tulis pesan atau permintaan data Anda di sini..." required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                    <div class="loading">Memproses...</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>

                    <button type="submit">Kirim Pesan</button>
                </div>

            </div>
        </form><!-- End Contact Form -->
    </div>
</section>
