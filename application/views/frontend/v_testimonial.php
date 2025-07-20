<!-- application\views\frontend\v_testimonial.php -->

<!--/ Intro Start /-->
<div class="intro intro-single route bg-image" style="background-image: url(<?= base_url(); ?>assets_frontend/img/overlay-bg.jpg)">
  <div class="overlay-mf" style="background-color: rgba(0, 0, 0, 0.5);"></div>
  <div class="intro-content display-table">
    <div class="table-cell">
      <div class="container text-center text-white">
        <h2 class="intro-title mb-4">Kirim Testimonial</h2>
        <ol class="breadcrumb d-flex justify-content-center">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>" class="text-white">Beranda</a></li>
          <li class="breadcrumb-item active text-white">Testimonial</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--/ Intro End /-->

<!-- Custom CSS for Form -->
<style>
  .title-box h3,
  .title-box .subtitle-a {
    color: #4e3b17;
  }

  .title-box .line-mf {
    background-color: #e5d7a3;
  }

  .form-control {
    border-radius: 10px;
    border: 1px solid #ccc;
  }

  .form-control:focus {
    border-color: #e5d7a3;
    box-shadow: 0 0 0 0.2rem rgba(229, 215, 163, 0.25);
  }

  .btn-primary {
    background-color: #4e3b17;
    border-color: #4e3b17;
  }

  .btn-primary:hover {
    background-color: #3b2f12;
    border-color: #3b2f12;
  }

  .alert-success,
  .alert-danger {
    border-radius: 10px;
    font-size: 0.95rem;
  }

  label {
    font-weight: bold;
    color: #4e3b17;
  }
</style>

<!--/ Section Testimonial Form Start /-->
<section class="testimonial-form sect-pt4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <div class="title-box text-center">
          <h3 class="title-a">Kirim Testimonial</h3>
          <p class="subtitle-a">Pendapat Anda sangat berarti bagi kami.</p>
          <div class="line-mf"></div>
        </div>

        <!-- Flashdata -->
        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <!-- Form -->
        <form action="<?= base_url('welcome/kirim_testimonial') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <label for="nama">Nama Anda</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
          </div>

          <div class="form-group mb-3">
            <label for="foto">Foto (opsional)</label>
            <input type="file" name="foto" id="foto" class="form-control">
          </div>

          <div class="form-group mb-4">
            <label for="konten">Pesan / Ulasan</label>
            <textarea name="konten" id="konten" rows="5" class="form-control" required></textarea>
          </div>

          <button type="submit" class="btn btn-primary w-100">Kirim Testimonial</button>
        </form>

      </div>
    </div>
  </div>
</section>
<!--/ Section Testimonial Form End /-->
