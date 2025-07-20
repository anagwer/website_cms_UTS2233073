<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Portofolio</b> <small>Edit Portofolio</small></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo base_url('dashboard/portofolio'); ?>">
                    <button class="btn btn-sm btn-success">Kembali</button>
                </a>
                <br><br>
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i> Data Portofolio <small>Edit Portofolio</small>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php foreach ($portofolio as $p): ?>
                            <form method="post" action="<?php echo base_url('dashboard/portofolio_update'); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <input type="hidden" name="id" value="<?php echo $p->portofolio_id; ?>">

                                        <div class="form-group">
                                            <label>Judul Portofolio</label>
                                            <input type="text" name="judul" class="form-control" value="<?= set_value('judul', $p->portofolio_judul); ?>">
                                            <?= form_error('judul'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Konten Portofolio</label>
                                            <textarea class="form-control" name="konten" id="summernote"><?= set_value('konten', $p->portofolio_konten); ?></textarea>
                                            <?= form_error('konten'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <input type="text" name="kategori" class="form-control" value="<?= set_value('kategori', $p->portofolio_kategori); ?>">
                                            <?= form_error('kategori'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input type="number" name="tahun" class="form-control" value="<?= set_value('tahun', $p->portofolio_tahun); ?>">
                                            <?= form_error('tahun'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Client</label>
                                            <input type="text" name="client" class="form-control" value="<?= set_value('client', $p->portofolio_client); ?>">
                                            <?= form_error('client'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Durasi</label>
                                            <input type="text" name="durasi" class="form-control" value="<?= set_value('durasi', $p->portofolio_durasi); ?>">
                                            <?= form_error('durasi'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input type="file" name="sampul" class="form-control">
                                            <?php if (!empty($p->portofolio_sampul)): ?>
                                                <br>
                                                <img src="<?= base_url('gambar/portofolio/' . $p->portofolio_sampul); ?>" width="100" alt="Sampul">
                                            <?php endif; ?>
                                            <?php if (isset($gambar_error)): ?>
                                                <div class="text-danger"><?= $gambar_error; ?></div>
                                            <?php endif; ?>
                                            <?= form_error('sampul'); ?>
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
