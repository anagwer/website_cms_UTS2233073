<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Portofolio</h1>
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
                            <h3 class="card-title">Form Tambah Portofolio</h3>
                        </div>
                        <div class="card-body">
                            <?php if (validation_errors() || isset($gambar_error)): ?>
                                <div class="alert alert-danger">
                                    <?= validation_errors(); ?>
                                    <?= isset($gambar_error) ? $gambar_error : '' ?>
                                </div>
                            <?php endif; ?>

                            <form method="post" action="<?= base_url('dashboard/portofolio_aksi'); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label>Judul Portofolio</label>
                                            <input type="text" name="judul" class="form-control" placeholder="Masukkan judul proyek..." value="<?= set_value('judul'); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Konten Portofolio</label>
                                            <textarea class="form-control" name="konten" id="summernote" placeholder="Tuliskan deskripsi lengkap..."><?= set_value('konten'); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <input type="text" name="kategori" class="form-control" placeholder="Contoh: Web Design" value="<?= set_value('kategori'); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input type="number" name="tahun" class="form-control" placeholder="Contoh: 2025" value="<?= set_value('tahun'); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Client</label>
                                            <input type="text" name="client" class="form-control" placeholder="Contoh: UMKM Ayam Geprek" value="<?= set_value('client'); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Durasi</label>
                                            <input type="text" name="durasi" class="form-control" placeholder="Contoh: 1 Bulan" value="<?= set_value('durasi'); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Gambar (Sampul)</label>
                                            <input type="file" name="sampul" class="form-control">
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
