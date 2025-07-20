<!--/ Intro Start /-->
<div class="intro intro-single route bg-image" style="background-image: url(<?= base_url(); ?>assets_frontend/img/overlay-bg.jpg)">
      <div class="overlay-mf" style="background-color: rgba(0, 0, 0, 0.5);"></div>  
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container text-center text-white">
                <h2 class="intro-title mb-4">Portofolio Kami</h2>
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">Portofolio</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--/ Intro End /-->

<!-- Custom CSS -->
<style>
    .card-img-top {
        height: 200px;
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s ease;
    }

    .card-img-top:hover {
        transform: scale(1.05);
    }

    .card {
        border-radius: 12px;
        transition: box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        flex-grow: 1;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-align: center;
    }

    .card-title {
        font-size: 1rem;
        font-weight: 700;
        margin-top: 0.8rem;
        margin-bottom: 0.5rem;
    }

    .card-description {
        font-size: 0.9rem;
        color: #555;
        margin-bottom: 1rem;
    }

    .text-muted.small {
        font-size: 0.85rem;
        color: #888;
    }

    a.stretched-link {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
    }

    @media (max-width: 768px) {
        .card-img-top {
            height: 150px;
        }
    }
</style>

<!--/ Section Portofolio Start /-->
<section class="blog-wrapper sect-pt4" id="portofolio">
    <div class="container">
        <?php if (count($portofolio) == 0): ?>
            <div class="text-center my-5">
                <h5 class="text-muted">Portofolio tidak tersedia.</h5>
            </div>
        <?php else: ?>
            <div class="row">
                <!-- Konten utama (portofolio) -->
                <div class="col-md-8">
                    <div class="row">
                        <?php foreach ($portofolio as $p): ?>
                            <div class="col-md-6 mb-4 d-flex align-items-stretch">
                                <div class="card shadow-sm border-0 position-relative animate__animated animate__fadeInUp">

                                    <?php if (!empty($p->portofolio_sampul)): ?>
                                        <img src="<?= base_url('gambar/portofolio/' . $p->portofolio_sampul); ?>" class="card-img-top" alt="<?= $p->portofolio_judul; ?>">
                                    <?php endif; ?>

                                    <div class="card-body">
                                        <h5 class="card-title"><?= $p->portofolio_judul; ?></h5>
                                        <p class="card-description"><?= character_limiter(strip_tags($p->portofolio_konten), 90); ?></p>

                                        <ul class="list-unstyled text-muted small mb-2" style="font-size: 0.85rem;">
                                            <li><i class="fas fa-tag text-primary me-1"></i> <?= $p->portofolio_kategori; ?></li>
                                            <li><i class="fas fa-calendar-alt text-primary me-1"></i> <?= $p->portofolio_tahun; ?></li>
                                            <li><i class="fas fa-user text-primary me-1"></i> <?= $p->portofolio_client; ?></li>
                                            <li><i class="fas fa-clock text-primary me-1"></i> <?= $p->portofolio_durasi; ?></li>
                                        </ul>

                                        <p class="text-muted small">
                                            <i class="ion-ios-calendar"></i> <?= date('d M Y', strtotime($p->portofolio_tanggal)); ?>
                                        </p>
                                    </div>

                                    <a href="<?= base_url('portofolio/' . $p->portofolio_slug); ?>" class="stretched-link"></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-4">
                    <?php $this->load->view('frontend/v_sidebar_portofolio'); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<!--/ Section Portofolio End /-->