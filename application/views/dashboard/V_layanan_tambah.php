<!-- application\views\dashboard\v_layanan_tambah.php -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Layanan</b> <small>Tambah Layanan</small></h1>
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
                            <i class="fas fa-file"></i> Data Layanan <small> Tambah Layanan Baru</small>
                        </h3>
                    </div>

                    <div class="card-body">

                        <?php if (validation_errors() || isset($gambar_error)): ?>
                            <div class="alert alert-danger">
                                <?php echo validation_errors(); ?>
                                <?php if (isset($gambar_error)) echo $gambar_error; ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?php echo base_url('dashboard/layanan_aksi'); ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <label>Judul Layanan</label>
                                        <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Layanan..." value="<?php echo set_value('judul'); ?>">
                                        <br>
                                        <?php echo form_error('judul'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Konten Layanan</label>
                                        <?php echo form_error('konten'); ?>
                                        <textarea class="form-control" name="konten" id="summernote"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" name="sampul" class="form-control">
                                        <br>
                                        <?php if (isset($gambar_error)) {
                                            echo '<div class="text-danger">' . $gambar_error . '</div>';
                                        } ?>
                                        <?php echo form_error('sampul'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="status" value="Draft" class="btn btn-sm btn-warning btn-block">
                                        <input type="submit" name="status" value="Publish" class="btn btn-sm btn-success btn-block">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>