<!--/ Intro Skew Start /-->
<div class="intro intro-single route bg-image" style="background-image: url(<?= base_url(); ?>assets_frontend/img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container text-center text-white">
                <h2 class="intro-title mb-4">Detail Layanan</h2>
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('layanan'); ?>" class="text-white">Layanan</a></li>
                    <li class="breadcrumb-item active text-white"><?= $layanan->layanan_judul; ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--/ Intro Skew End /-->

<!-- Custom CSS -->
<style>
    .cover-img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        transition: transform 0.3s ease;
    }

    @media (max-width: 768px) {
        .cover-img {
            height: 220px;
        }
    }

    @media (max-width: 480px) {
        .cover-img {
            height: 180px;
        }
    }

    .cover-img:hover {
        transform: scale(1.02);
        cursor: zoom-in;
    }

    .article-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .post-meta ul {
        list-style: none;
        padding: 0;
        display: flex;
        gap: 15px;
        font-size: 0.95rem;
        color: #777;
    }

    .post-meta ul li {
        display: flex;
        align-items: center;
    }

    .post-meta ul li span {
        margin-right: 5px;
        color: #007bff;
    }

    .article-content {
        line-height: 1.8;
        font-size: 1.1rem;
        color: #333;
        margin-top: 1.5rem;
    }

    .post-box {
        padding: 1.5rem;
        border-radius: 12px;
        background-color: #fff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
</style>

<!--/ Section Blog-Single Start /-->
<section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="post-box animate__animated animate__fadeInUp">
                    <?php if ($layanan->layanan_sampul != ''): ?>
                        <div class="post-thumb mb-4">
                            <a href="<?= base_url('gambar/layanan/' . $layanan->layanan_sampul); ?>" target="_blank">
                                <img src="<?= base_url('gambar/layanan/' . $layanan->layanan_sampul); ?>"
                                    class="cover-img"
                                    alt="<?= $layanan->layanan_judul; ?>">
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="post-meta mb-3">
                        <h1 class="article-title"><?= $layanan->layanan_judul; ?></h1>
                        <?php if (!empty($layanan->layanan_deskripsi)): ?>
                            <p class="text-muted mb-2"><?= $layanan->layanan_deskripsi; ?></p>
                        <?php endif; ?>
                        <ul>
                            <li><span class="ion-ios-person"></span> Admin</li>
                            <li><span class="ion-ios-calendar"></span> <?= date('d M Y', strtotime($layanan->layanan_tanggal)); ?></li>
                        </ul>
                    </div>

                    <div class="article-content">
                        <?= $layanan->layanan_konten; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php $this->load->view('frontend/v_sidebar_layanan'); ?>
            </div>
        </div>
    </div>
    </div>
</section>
<!--/ Section Blog-Single End /-->