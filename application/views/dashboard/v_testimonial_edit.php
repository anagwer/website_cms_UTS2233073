<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Testimonial</b> <small>Edit Testimonial</small></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo base_url('dashboard/testimonial'); ?>">
                    <button class="btn btn-sm btn-success">Kembali</button>
                </a>
                <br><br>
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i> Data Testimonial <small>Edit Testimonial</small>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php foreach ($testimonial as $t): ?>
                            <form method="post" action="<?= base_url('dashboard/testimonial_update'); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <input type="hidden" name="id" value="<?= $t->testimonial_id; ?>">

                                        <div class="form-group">
                                            <label>Nama Pengunjung</label>
                                            <input type="text" name="nama" class="form-control" value="<?= set_value('nama', $t->testimonial_nama); ?>">
                                            <?= form_error('nama'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Pesan / Testimonial</label>
                                            <textarea class="form-control" name="konten" id="summernote"><?= set_value('konten', $t->testimonial_konten); ?></textarea>
                                            <?= form_error('konten'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Foto Pengunjung</label>
                                            <input type="file" name="foto" class="form-control">
                                            <?php if (!empty($t->testimonial_foto)): ?>
                                                <br>
                                                <img src="<?= base_url('gambar/testimonial/' . $t->testimonial_foto); ?>" width="100" alt="Foto">
                                            <?php endif; ?>
                                            <?php if (isset($gambar_error)): ?>
                                                <div class="text-danger"><?= $gambar_error; ?></div>
                                            <?php endif; ?>
                                            <?= form_error('foto'); ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="status" id="status-value" value="">
                                            <button type="submit" onclick="document.getElementById('status-value').value='draft'" class="btn btn-sm btn-warning btn-block">Draft</button>
                                            <button type="submit" onclick="document.getElementById('status-value').value='publish'" class="btn btn-sm btn-success btn-block">Publish</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
