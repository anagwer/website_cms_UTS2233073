<!--/ Intro Skew Star /-->
<div id="home" class="intro route bg-image" style="background-image:url(<?php echo base_url(); ?>assets_frontend/img/vanlybakery-hero.jpg)">
    <div class="overlay-itro" style="background-color: rgba(78, 59, 23, 0.7);"></div>
    <style>
        /* Warna Utama */
        :root {
            --cream: #f9f6f1;
            --gold: #e5d7a3;
            --brown-dark: #4e3b17;
            --brown-light: #8b7355;
        }

        body {
            background-color: var(--cream) !important;
            color: var(--brown-dark) !important;
            font-family: 'Poppins', sans-serif;
        }

        /* Header & Teks */
        .intro-title,
        .display-6,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .title-a,
        .subtitle-a,
        .card-title,
        .card-description {
            color: var(--brown-dark) !important;
        }

        .intro-title,
        .display-6 {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        /* Navigasi & Link */
        a {
            color: var(--brown-dark);
            transition: all 0.3s ease;
        }

        a:hover {
            color: var(--gold) !important;
            text-decoration: none;
        }

        /* Garis Dekoratif */
        .line-mf {
            background-color: var(--gold) !important;
            height: 2px;
        }

        /* Kartu Layanan/Portofolio */
        .card {
            background-color: white !important;
            border: 1px solid var(--gold) !important;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 10px 25px rgba(139, 115, 85, 0.2);
            transform: translateY(-5px);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card-img-top:hover {
            transform: scale(1.05);
        }

        .card-body {
            background-color: white !important;
            color: var(--brown-dark);
        }

        /* Overlay Section */
        .overlay-itro,
        .overlay-mf {
            background-color: rgba(78, 59, 23, 0.7) !important;
        }

        /* Blog */
        .card-blog {
            background-color: white !important;
            border: 1px solid var(--gold);
        }

        /* Tombol */
        .btn-custom {
            background-color: var(--brown-dark);
            color: var(--gold);
            border: 1px solid var(--brown-dark);
        }

        .btn-custom:hover {
            background-color: var(--gold);
            color: var(--brown-dark);
        }

        /* Footer */
        footer {
            background-color: var(--brown-dark);
            color: var(--gold);
        }

        .color-d {
            color: white !important;
        }
    </style>

    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                <p class="display-6 color-d">Selamat Datang</p>
                <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
                <h1 class="intro-title color-d mb-4"><?php echo $pengaturan->nama; ?></h1>
                <p class="display-6 color-d">Dengan berbagai pilihan layanan seperti:</p>
                <p class="intro-subtitle">
                    <span class="text-slider-items">Birthday Cake, Bento Cake, Boucake, Tier Cake, Cupcake, Brownies Tower</span><strong class="text-slider"></strong>
                </p>
            </div>
        </div>
    </div>
</div>
<!--/ Intro Skew End /-->

<!-- Custom CSS -->
<style>
    /* Tambahan Spesifik untuk Layout */
    .sect-pt4 {
        padding-top: 4rem;
        padding-bottom: 4rem;
        background-color: var(--cream);
    }

    .paralax-mf {
        position: relative;
        padding: 4rem 0;
    }

    /* Counter */
    .counter-box {
        color: var(--gold);
    }

    .counter-box .counter-num {
        color: white;
    }

    /* Social Media */
    .socials {
        padding: 1rem 0;
    }

    .socials ul li {
        display: inline-block;
    }

    .socials ul li a {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(229, 215, 163, 0.2);
        border-radius: 50%;
        margin-right: 10px;
        color: var(--brown-dark);
    }

    .socials ul li a:hover {
        background-color: var(--gold);
        color: white;
    }

    .news-title {
        font-weight: bold;
        color: var(--brown-dark);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* maksimal 2 baris */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: 3.6em;
        /* jaga tinggi agar rata antar kartu */
    }
</style>

<!-- / Section services Start /-->
<section class="blog-wrapper sect-pt4" id="layanan">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="title-box">
                    <h3 class="title-a">Layanan</h3>
                    <p class="subtitle-a">Kami siap melayani anda</p>
                    <div class="line-mf"></div>
                </div>
            </div>
        </div>

        <?php if (count($layanan) == 0): ?>
            <div class="text-center my-5">
                <h5 class="text-muted">Layanan tidak tersedia.</h5>
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($layanan as $l): ?>
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card shadow-sm position-relative">
                            <?php if ($l->layanan_sampul != ""): ?>
                                <img src="<?= base_url('gambar/layanan/' . $l->layanan_sampul); ?>" class="card-img-top" alt="<?= $l->layanan_judul; ?>">
                            <?php endif; ?>

                            <div class="card-body">
                                <h5 class="card-title"><?= $l->layanan_judul; ?></h5>
                                <p class="card-description"><?= character_limiter(strip_tags($l->layanan_konten), 100); ?></p>
                                <div class="card-footer">
                                    <i class="ion-ios-calendar"></i>
                                    <?= date('d M Y', strtotime($l->layanan_tanggal)); ?>
                                </div>
                            </div>

                            <a href="<?= base_url('layanan/' . $l->layanan_slug); ?>" class="stretched-link"></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!--/ Section Services End /-->

<!-- experience -->
<div class="section-counter paralax-mf bg-image" style="background-image: url(<?php echo base_url(); ?>assets_frontend/img/counters-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-lg-3">
                <div class="counter-box">
                    <div class="counter-ico">
                        <span class="ico-circle"><i class="ion-checkmark-round"></i></span>
                    </div>
                    <div class="counter-num">
                        <p class="counter">450</p>
                        <span class="counter-text">KUE SELESAI</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="counter-box pt-4 pt-md-0">
                    <div class="counter-ico">
                        <span class="ico-circle"><i class="ion-ios-calendar-outline"></i></span>
                    </div>
                    <div class="counter-num">
                        <p class="counter">15</p>
                        <span class="counter-text">TAHUN PENGALAMAN</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="counter-box pt-4 pt-md-0">
                    <div class="counter-ico">
                        <span class="ico-circle"><i class="ion-ios-people"></i></span>
                    </div>
                    <div class="counter-num">
                        <p class="counter">550</p>
                        <span class="counter-text">PELANGGAN</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="counter-box pt-4 pt-md-0">
                    <div class="counter-ico">
                        <span class="ico-circle"><i class="ion-ribbon-a"></i></span>
                    </div>
                    <div class="counter-num">
                        <p class="counter">36</p>
                        <span class="counter-text">PENGHARGAAN</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section experience End -->

<!-- / Section Portofolio Start /-->
<section class="blog-wrapper sect-pt4" id="portofolio">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="title-box">
                    <h3 class="title-a">Portofolio</h3>
                    <p class="subtitle-a">Karya Terbaik Kami</p>
                    <div class="line-mf"></div>
                </div>
            </div>
        </div>

        <?php if (empty($portofolio)): ?>
            <div class="text-center my-5">
                <h5 class="text-muted">Portofolio tidak tersedia.</h5>
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($portofolio as $p): ?>
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card shadow-sm position-relative">
                            <?php if (!empty($p->portofolio_sampul)): ?>
                                <img src="<?= base_url('gambar/portofolio/' . $p->portofolio_sampul); ?>" class="card-img-top" alt="<?= $p->portofolio_judul; ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $p->portofolio_judul; ?></h5>
                                <p class="card-description"><?= character_limiter(strip_tags($p->portofolio_konten), 100); ?></p>
                                <div class="card-footer">
                                    <i class="ion-ios-calendar"></i>
                                    <?= date('d M Y', strtotime($p->portofolio_tanggal)); ?>
                                </div>
                            </div>
                            <a href="<?= base_url('portofolio/' . $p->portofolio_slug); ?>" class="stretched-link"></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!--/ Section Portofolio End /-->

<!--/ Section Testimonials Start /-->
<div class="testimonials paralax-mf bg-image" style="background-image: url(<?= base_url(); ?>assets_frontend/img/overlay-bg.jpg);">
    <div class="overlay-mf"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-mf" class="owl-carousel owl-theme">

                    <?php if (!empty($testimonial)): ?>
                        <?php foreach ($testimonial as $t): ?>
                            <div class="testimonial-box">
                                <div class="author-test">
                                    <img src="<?= base_url('gambar/testimonial/' . ($t->testimonial_foto ?? 'default.jpg')) ?>" alt="<?= htmlspecialchars($t->testimonial_nama) ?>" class="rounded-circle b-shadow-a" style="width:80px; height:80px; object-fit:cover;">
                                    <span class="author"><?= htmlspecialchars($t->testimonial_nama) ?></span>
                                </div>
                                <div class="content-test">
                                    <p class="description lead">
                                        <?= htmlspecialchars($t->testimonial_konten) ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center">Belum ada testimonial.</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Section Testimonials End /-->

<!--/ Section Blog Star /-->
<section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h3 class="title-a">
                        BERITA
                    </h3>
                    <p class="subtitle-a">
                        Artikel terbaru Dari Kami
                    </p>
                    <div class="line-mf"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($artikel as $a) {
            ?>
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-img">
                            <a href="<?php echo base_url() . $a->artikel_slug; ?>">
                                <?php if ($a->artikel_sampul != "") { ?>
                                    <img src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->artikel_sampul ?>" alt="<?php echo base_url() . $a->artikel_judul ?>" class="img-fluid">
                                <?php } ?>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="card-category-box">
                                <div class="card-category">
                                    <a href="<?php echo base_url() . 'kategori/' . $a->kategori_slug; ?>">
                                        <h6 class="category"><?php echo $a->kategori_nama ?></h6>
                                    </a>
                                </div>
                            </div>
                            <h3 class="card-title  news-title">
                                <a href="<?php echo base_url() . $a->artikel_slug ?>"><?php echo $a->artikel_judul ?></a>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="post-author">
                                <span class="author"><?php echo $a->pengguna_nama; ?></span>
                            </div>
                            <div class="post-date">
                                <span class="ion-ios-clockoutline"></span> <?php echo date('D-M-Y', strtotime($a->artikel_tanggal)); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!--/ Section Blog End /-->