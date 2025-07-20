<div class="intro intro-single route bg-image" style="background-image: url(<?= base_url(); ?>assets_frontend/img/overlay-bg.jpg)"> 
      <div class="overlay-mf" style="background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container text-center">
                <h1 class="intro-title mb-3"><?php echo isset($halaman[0]->halaman_judul) ? $halaman[0]->halaman_judul : 'Halaman'; ?></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>"><i class="fas fa-home mr-1"></i> Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">Halaman</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--/ Intro Skew End /-->   

<!--/ Page Content Section Start /-->
<section class="page-content sect-pt4 pb-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">

        <?php if (empty($halaman)) { ?>
          <div class="text-center py-5">
            <div class="alert alert-warning py-4 shadow-sm rounded" style="background-color: #fffbe6; border: 1px solid #f3e6a9;">
              <i class="fas fa-exclamation-circle fa-2x mb-3" style="color: #4e3b17;"></i>
              <h3 style="color: #4e3b17;">Halaman Tidak Ditemukan</h3>
              <p class="mb-0 text-muted">Halaman yang Anda cari tidak tersedia</p>
            </div>
            <a href="<?php echo base_url(); ?>" class="btn btn-primary mt-3">
              <i class="fas fa-arrow-left mr-2"></i>Kembali ke Beranda
            </a>
          </div>

        <?php } else { ?>
          <?php foreach ($halaman as $h) { ?>
            <div class="card shadow-sm border-0" style="background-color: #f9f6f1;">
              <div class="card-body p-4">

                <article class="page-article">
                  <div class="article-header text-center mb-4">
                    <h1 class="article-title" style="color: #4e3b17;"><?php echo $h->halaman_judul; ?></h1>
                    <div class="divider-custom d-flex align-items-center justify-content-center my-3">
                      <div class="divider-line" style="width: 60px; height: 2px; background-color: #e5d7a3;"></div>
                      <div class="divider-icon px-2" style="color: #e5d7a3;"><i class="fas fa-circle"></i></div>
                      <div class="divider-line" style="width: 60px; height: 2px; background-color: #e5d7a3;"></div>
                    </div>
                  </div>

                  <div class="article-content" style="color: #4e3b17;">
                    <?php echo $h->halaman_konten; ?>
                  </div>

                  <div class="article-footer mt-5 pt-4 border-top text-end">
                    <a href="<?php echo base_url(); ?>" class="btn btn-outline-dark">
                      <i class="fas fa-chevron-left mr-2"></i>Kembali
                    </a>
                  </div>
                </article>

              </div>
            </div>
          <?php } ?>
        <?php } ?>

      </div>
    </div>
  </div>
</section>
<!--/ Page Content Section End /-->
