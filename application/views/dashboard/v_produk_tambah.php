<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Produk</b> <small>Tambah Produk Baru</small></h1>
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
                            <h3 class="card-title"><i class="fas fa-box"></i> Produk <small>Tambah Produk</small></h3>
                        </div>

                        <div class="card-body">
                            <form method="post" action="<?= base_url('dashboard/produk_aksi'); ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" name="kategori" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" step="0.01" name="harga" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label>Pembuatan</label> <!-- Ganti dari Stok -->
                                    <input type="text" name="pembuatan" class="form-control" placeholder="Misal: 2 hari / Buatan Lokal" required>
                                </div>

                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Foto Produk</label>
                                    <input type="file" name="foto" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="nonaktif">Nonaktif</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>