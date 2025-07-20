<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Edit Produk</b></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 connectedSortable">
                    <a href="<?php echo base_url('dashboard/produk'); ?>">
                        <button class="btn btn-sm btn-success">Kembali</button>
                    </a>
                    <br><br>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-edit"></i> Edit Produk</h3>
                        </div>

                        <div class="card-body">
                            <form method="post" action="<?= base_url('dashboard/produk_update'); ?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $produk->produk_id ?>">
                                <input type="hidden" name="foto_lama" value="<?= $produk->produk_foto ?>">

                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="nama" class="form-control" value="<?= $produk->produk_nama ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Kategori Produk</label>
                                    <input type="text" name="kategori" class="form-control" value="<?= $produk->produk_kategori ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Harga Produk</label>
                                    <input type="number" step="0.01" name="harga" class="form-control" value="<?= $produk->produk_harga ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Lama Pembuatan</label>
                                    <input type="text" name="pembuatan" class="form-control" value="<?= $produk->produk_pembuatan ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Keterangan Produk</label>
                                    <textarea name="keterangan" class="form-control" rows="3"><?= $produk->produk_keterangan ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Foto Saat Ini</label><br>
                                    <img src="<?= base_url('assets/uploads/produk/' . $produk->produk_foto) ?>" width="150"><br><br>
                                    <label>Ganti Foto (Opsional)</label>
                                    <input type="file" name="foto" class="form-control" accept="image/*">
                                </div>

                                <div class="form-group">
                                    <label>Status Produk</label>
                                    <select name="status" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="aktif" <?= ($produk->produk_status == 'aktif' ? 'selected' : '') ?>>Aktif</option>
                                        <option value="nonaktif" <?= ($produk->produk_status == 'nonaktif' ? 'selected' : '') ?>>Tidak Aktif</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-block btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>