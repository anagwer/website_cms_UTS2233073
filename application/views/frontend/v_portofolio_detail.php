<!--/ Intro Skew Start /-->
<div class="intro intro-single route bg-image" style="background-image: url('<?= base_url(); ?>assets_frontend/img/overlay-bg.jpg'); background-size: cover;">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container text-center text-white">
                <h2 class="intro-title mb-4">Detail Portofolio</h2>
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('portofolio'); ?>" class="text-white">Portofolio</a></li>
                    <li class="breadcrumb-item active text-white"><?= htmlspecialchars($portofolio->portofolio_judul); ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--/ Intro Skew End /-->

<style>
    .portfolio-details {
        padding: 80px 0;
    }

    .portfolio-img {
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    }

    .portfolio-meta li {
        margin-bottom: 10px;
        font-size: 1rem;
    }

    .portfolio-description {
        font-size: 1.05rem;
        line-height: 1.7;
    }

    .tech-icons img {
        width: 50px;
        margin: 10px;
        transition: 0.3s;
    }

    .tech-icons img:hover {
        transform: scale(1.1);
    }

    .cta-box {
        background: #f8f9fa;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .text-justify {
        text-align: justify;
    }

    .card:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

</style>

<!-- Portfolio Detail Section -->
<section class="portfolio-details container" data-aos="fade-up">
    <div class="row align-items-center mb-5">
        <div class="col-lg-7 mb-4 mb-lg-0">
            <img src="<?= base_url('gambar/portofolio/' . $portofolio->portofolio_sampul); ?>" alt="<?= htmlspecialchars($portofolio->portofolio_judul); ?>" class="img-fluid portfolio-img">
        </div>
        <div class="col-lg-5">
            <h2 class="mb-3"><?= htmlspecialchars($portofolio->portofolio_judul); ?></h2>
            <ul class="list-unstyled portfolio-meta">
                <li><i class="fas fa-briefcase me-2 text-primary"></i> <strong>Nama Proyek:</strong> <?= htmlspecialchars($portofolio->portofolio_judul); ?></li>
                <li><i class="fas fa-calendar-check me-2 text-primary"></i> <strong>Tanggal Selesai:</strong> <?= date('F Y', strtotime($portofolio->portofolio_tanggal)); ?></li>
                <li><i class="fas fa-laptop-code me-2 text-primary"></i> <strong>Platform:</strong> Web (Responsive)</li>
                <li><i class="fas fa-user-tie me-2 text-primary"></i> <strong>Dibuat Untuk:</strong> <?= htmlspecialchars($portofolio->portofolio_client); ?></li>
            </ul>

            <p class="portfolio-description mt-4 text-justify">
                <?= $portofolio->portofolio_konten; ?>
            </p>
        </div>
    </div>

    <!-- Rekomendasi Portofolio Lainnya -->
    <div class="row mb-5">
        <div class="col-md-12">
            <h4 class="mb-4 text-center">Rekomendasi Portofolio Lainnya</h4>
        </div>

        <?php foreach ($portofolio_lain as $item): ?>
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="<?= base_url('portofolio/' . $item->portofolio_slug); ?>" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm border-0 hover-shadow">
                        <img src="<?= base_url('gambar/portofolio/' . $item->portofolio_sampul); ?>" class="card-img-top" alt="<?= htmlspecialchars($item->portofolio_judul); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($item->portofolio_judul); ?></h5>
                            <p class="text-muted mb-0"><?= htmlspecialchars($item->portofolio_kategori); ?> | <?= $item->portofolio_tahun; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Call to Action -->
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="cta-box">
                <h4 class="mb-3">Tertarik Membuat Website Seperti Ini?</h4>
                <p class="mb-4">Kami siap membantu mewujudkan website impian Anda untuk bisnis, personal, atau UMKM.</p>
                <a href="<?= base_url('page/kontak-kami'); ?>" class="btn btn-outline-primary btn-lg px-5">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>