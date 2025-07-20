<!--/ Intro Skew Star /-->
<div id="home" class="intro route bg-image" style="background-image:url(<?php echo base_url(); ?>assets_frontend/img/intro-bg.jpg)">
    <div class="overlay-itro"></div>
    <style>
        .na {
            color: #fff;
            text-decoration: none;
        }

        .me p,
        .me h1 {
            text-align: center;
        }

        .me p {
            font-weight: 200;
        }

        .me span {
            font-weight: bold;
        }

        .social {
            position: fixed;
            top: 20px;
            z-index: 1;
        }

        .social ul {
            padding: 0px;
            transform: translate(-270px, 0);
        }

        .social ul li {
            display: block;
            background: rgba(0, 0, 0, 0.36);
            width: 300px;
            text-align: right;
            padding: 10px;
            border-radius: 0 30px 30px 0;
            transition: all 1s;
        }

        .social ul li:hover {
            transform: translate(110px, 0);
            background: rgba(255, 255, 255, 0.4);
        }

        .social ul li:hover a {
            color: #000;
        }

        .social ul li:hover i {
            color: #fff;
            background: rgba(0, 0, 0, 0.36);
            transform: rotate(360deg);
            transition: all 1s;
        }

        .social ul li i {
            margin-left: 10px;
            color: #000;
            background: #fff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 20px;
            background: #ffffff;
            transform: rotate(0deg);
        }
    </style>

    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                <p class="display-6 color-d">Selamat Datang</p>
                <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
                <h1 class="intro-title mb-4"><?php echo $pengaturan->nama; ?></h1>
                <p class="display-6 color-d">Dengan berbagai pilihan layanan seperti:</p>
                <p class="intro-subtitle"><span class="text-slider-items">
                        CEO DevFolio,Web Developer,Web Designer,Frontend Developer,Graphic Designer </span><strong class="text-slider"></strong></p>
                <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px4" href="#about" role="button">Learn More</a></p> -->

            </div>
        </div>
    </div>
</div>
<!--/ Intro Skew End /-->

<!-- Custom CSS -->
<style>
    .card-img-top {
        height: 200px;
        width: 100%;
        object-fit: cover;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        transition: transform 0.3s ease;
    }

    .card-img-top:hover {
        transform: scale(1.05);
    }

    .card {
        border-radius: 12px;
        transition: box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 1rem;
        text-align: center;
    }

    .card-title {
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .card-description {
        font-size: 0.95rem;
        color: #555;
        margin-bottom: 1rem;
    }

    .card-footer {
        font-size: 0.8rem;
        color: #888;
    }

    .stretched-link {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
    }

    /* Responsive spacing */
    .col-md-4 {
        display: flex;
        flex-direction: column;
    }
</style>

<!-- / Section Layanan Start /-->
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
                        <div class="card shadow-sm border-0 position-relative">
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

<!-- expierence -->
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
                        <span class="counter-text">WORKS COMPLETED</span>
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
                        <span class="counter-text">YEARS OF EXPERIENCE</span>
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
                        <span class="counter-text">TOTAL CLIENTS</span>
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
                        <span class="counter-text">AWARD WON</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section experience End -->

<!--/ Section Portfolio Star /-->
<section id="work" class="portfolio-mf sect-pt4 route">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h3 class="title-a">
                        Portfolio
                    </h3>
                    <p class="subtitle-a">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    </p>
                    <div class="line-mf"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="work-box">
                    <a href="<?php echo base_url(); ?>assets_frontend/img/work-1.jpg" data-lightbox="gallery-mf">
                        <div class="work-img">
                            <img src="<?php echo base_url(); ?>assets_frontend/img/work-1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="work-content">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2 class="w-title">Lorem impsum dolor</h2>
                                    <div class="w-more">
                                        <span class="w-category">Web Design</span> / <span class="w-date">18 Sep. 2018</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="w-like">
                                        <span class="ion-ios-plus-outline"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="work-box">
                    <a href="<?php echo base_url(); ?>assets_frontend/img/work-2.jpg" data-lightbox="gallery-mf">
                        <div class="work-img">
                            <img src="<?php echo base_url(); ?>assets_frontend/img/work-2.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="work-content">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2 class="w-title">Loreda Cuno Nere</h2>
                                    <div class="w-more">
                                        <span class="w-category">Web Design</span> / <span class="w-date">18 Sep. 2018</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="w-like">
                                        <span class="ion-ios-plus-outline"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="work-box">
                    <a href="<?php echo base_url(); ?>assets_frontend/img/work-3.jpg" data-lightbox="gallery-mf">
                        <div class="work-img">
                            <img src="<?php echo base_url(); ?>assets_frontend/img/work-3.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="work-content">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2 class="w-title">Mavrito Lana Dere</h2>
                                    <div class="w-more">
                                        <span class="w-category">Web Design</span> / <span class="w-date">18 Sep. 2018</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="w-like">
                                        <span class="ion-ios-plus-outline"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="work-box">
                    <a href="<?php echo base_url(); ?>assets_frontend/img/work-4.jpg" data-lightbox="gallery-mf">
                        <div class="work-img">
                            <img src="<?php echo base_url(); ?>assets_frontend/img/work-4.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="work-content">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2 class="w-title">Bindo Laro Cado</h2>
                                    <div class="w-more">
                                        <span class="w-category">Web Design</span> / <span class="w-date">18 Sep. 2018</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="w-like">
                                        <span class="ion-ios-plus-outline"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="work-box">
                    <a href="<?php echo base_url(); ?>assets_frontend/img/work-5.jpg" data-lightbox="gallery-mf">
                        <div class="work-img">
                            <img src="<?php echo base_url(); ?>assets_frontend/img/work-5.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="work-content">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2 class="w-title">Studio Lena Mado</h2>
                                    <div class="w-more">
                                        <span class="w-category">Web Design</span> / <span class="w-date">18 Sep. 2018</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="w-like">
                                        <span class="ion-ios-plus-outline"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="work-box">
                    <a href="<?php echo base_url(); ?>assets_frontend/img/work-6.jpg" data-lightbox="gallery-mf">
                        <div class="work-img">
                            <img src="<?php echo base_url(); ?>assets_frontend/img/work-6.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="work-content">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2 class="w-title">Studio Big Bang</h2>
                                    <div class="w-more">
                                        <span class="w-category">Web Design</span> / <span class="w-date">18 Sep. 2017</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="w-like">
                                        <span class="ion-ios-plus-outline"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Section Portfolio End /-->

<!--/ Section Testimonials Start /-->
<div class="testimonials paralax-mf bg-image" style="background-image: url(<?= base_url(); ?>assets_frontend/img/overlay-bg.jpg);">
    <div class="overlay-mf"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-mf" class="owl-carousel owl-theme">

                    <!-- Testimoni 1 -->
                    <div class="testimonial-box text-center">
                        <div class="author-test mb-3">
                            <img src="<?= base_url(); ?>assets_frontend/img/tria.JPG" alt="extriana" class="rounded-circle b-shadow-a" style="width: 100px; height: 100px; object-fit: cover;">
                            <h6 class="author mt-2">extriana</h6>
                        </div>
                        <div class="content-test">
                            <p class="description lead">
                                Website ini sangat bagus dan desainnya yang modern.
                            </p>
                            <span class="comit"><i class="fa fa-quote-right"></i></span>
                        </div>
                    </div>

                    <!-- Testimoni 2 -->
                    <div class="testimonial-box text-center">
                        <div class="author-test mb-3">
                            <img src="<?= base_url(); ?>assets_frontend/img/naufal.jpg" alt="naufal" class="rounded-circle b-shadow-a" style="width: 100px; height: 100px; object-fit: cover;">
                            <h6 class="author mt-2">naufal</h6>
                        </div>
                        <div class="content-test">
                            <p class="description lead">
                                Website sangat mudah dan cepat untuk bisa dikembangkan.
                            </p>
                            <span class="comit"><i class="fa fa-quote-right"></i></span>
                        </div>
                    </div>

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
                            <h3 class="card-title">
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