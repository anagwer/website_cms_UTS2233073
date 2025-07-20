<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Testimonial</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Testimonial</h3>
                        </div>
                        <div class="card-body">
                            <?php if (validation_errors() || isset($gambar_error)): ?>
                                <div class="alert alert-danger">
                                    <?= validation_errors(); ?>
                                    <?= isset($gambar_error) ? $gambar_error : '' ?>
                                </div>
                            <?php endif; ?>

                            <form method="post" action="<?= base_url('dashboard/testimonial_aksi'); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label>Nama Pengunjung</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama..." value="<?= set_value('nama'); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Pesan / Testimonial</label>
                                            <textarea class="form-control" name="konten" id="summernote" placeholder="Tulis pesan dari pengunjung..."><?= set_value('konten'); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Foto Pengunjung</label>
                                            <input type="file" name="foto" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="status" value="Draft" class="btn btn-warning btn-block">
                                            <input type="submit" name="status" value="Publish" class="btn btn-success btn-block">
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
