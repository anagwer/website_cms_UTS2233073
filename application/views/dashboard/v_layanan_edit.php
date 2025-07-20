<!-- application\views\dashboard\v_layanan_edit.php -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Layanan</b> <small>Edit Layanan</small></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo base_url('dashboard/layanan'); ?>">
                    <button class="btn btn-sm btn-success">Kembali</button>
                </a>
                <br><br>

                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i> Data Layanan <small>Edit Layanan</small>
                        </h3>
                    </div>

                    <div class="card-body">
                        <?php foreach ($layanan as $l): ?>
                            <form method="post" action="<?php echo base_url('dashboard/layanan_update'); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label>Judul Layanan</label>
                                            <input type="hidden" name="id" value="<?php echo $l->layanan_id; ?>">
                                            <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Layanan..." value="<?php echo set_value('judul', $l->layanan_judul); ?>">
                                            <br>
                                            <?php echo form_error('judul'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Konten Layanan</label>
                                            <?php echo form_error('konten'); ?>
                                            <textarea class="form-control" name="konten" id="summernote"><?php echo set_value('konten', $l->layanan_konten); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input type="file" name="sampul" class="form-control">
                                            <br>
                                            <?php if (isset($gambar_error)): ?>
                                                <div class="text-danger"><?php echo $gambar_error; ?></div>
                                            <?php endif; ?>
                                            <?php echo form_error('sampul'); ?>
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
