<!--/ Intro Start /-->
<div class="intro intro-single route bg-image" style="background-image: url(<?= base_url(); ?>assets_frontend/img/overlay-bg.jpg)">
  <div class="overlay-mf" style="background-color: rgba(0, 0, 0, 0.5);"></div>
  <div class="intro-content display-table">
    <div class="table-cell">
      <div class="container text-center text-white">
        <h2 class="intro-title mb-4">Layanan Kami</h2>
        <ol class="breadcrumb d-flex justify-content-center">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>" class="text-white">Beranda</a></li>
          <li class="breadcrumb-item active text-white">Layanan</li>
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
    background-color: #f9f6f1;
    color: #4e3b17;
  }

  .card:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
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
    font-size: 1.1rem;
    font-weight: bold;
    color: #4e3b17;
  }

  .card-description {
    font-size: 0.95rem;
    color: #5c4c3c;
    margin-bottom: 1rem;
  }

  .text-muted.small {
    font-size: 0.85rem;
    color: #998877;
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

<!--/ Section Layanan Start /-->
<section class="blog-wrapper sect-pt4" id="layanan">
  <div class="container">
    <?php if (count($layanan) == 0): ?>
      <div class="text-center my-5">
        <h5 class="text-muted">Layanan tidak tersedia.</h5>
      </div>
    <?php else: ?>
      <div class="row">
        <!-- Konten utama (layanan) -->
        <div class="col-md-8">
          <div class="row">
            <?php foreach ($layanan as $l): ?>
              <div class="col-md-6 mb-4 d-flex align-items-stretch">
                <div class="card shadow-sm border-0 position-relative animate__animated animate__fadeInUp">

                  <?php if ($l->layanan_sampul != ""): ?>
                    <img src="<?= base_url('gambar/layanan/' . $l->layanan_sampul); ?>" class="card-img-top" alt="<?= $l->layanan_judul; ?>">
                  <?php endif; ?>

                  <div class="card-body">
                    <h5 class="card-title"><?= $l->layanan_judul; ?></h5>
                    <p class="card-description"><?= character_limiter(strip_tags($l->layanan_konten), 100); ?></p>
                    <p class="text-muted small">
                      <i class="ion-ios-calendar"></i> <?= date('d M Y', strtotime($l->layanan_tanggal)); ?>
                    </p>
                  </div>

                  <a href="<?= base_url('layanan/' . $l->layanan_slug); ?>" class="stretched-link"></a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="col-md-4">
          <?php $this->load->view('frontend/v_sidebar_layanan'); ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
<!--/ Section Layanan End /-->
