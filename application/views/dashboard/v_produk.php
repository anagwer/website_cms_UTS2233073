<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1>Data Produk</h1>
                </div>
                <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                    <a href="<?= base_url('dashboard/produk_tambah') ?>" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah Produk
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Produk</h3>
                </div>

                <div class="card-body">
                    <table id="produkTable" class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Pembuatan</th> <!-- Ganti dari Stok -->
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($produk)): $no = 1; ?>
                                <?php foreach ($produk as $p): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <?php if ($p->produk_foto): ?>
                                                <img src="<?= base_url('assets/uploads/produk/' . $p->produk_foto) ?>" width="60" alt="Foto Produk">
                                            <?php else: ?>
                                                <span class="badge badge-secondary">Tidak ada foto</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= htmlspecialchars($p->produk_nama ?? '-') ?></td>
                                        <td><?= htmlspecialchars($p->produk_kategori ?? '-') ?></td>
                                        <td>Rp <?= number_format($p->produk_harga ?? 0, 0, ',', '.') ?></td>
                                        <td><?= htmlspecialchars($p->produk_pembuatan ?? '-') ?> hari</td> <!-- Ganti dari produk_stok -->
                                        <td>
                                            <span class="badge badge-<?= ($p->produk_status == 'aktif') ? 'success' : 'secondary' ?>">
                                                <?= ucfirst(htmlspecialchars($p->produk_status ?? '-')) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('dashboard/produk_edit/' . $p->produk_id) ?>" class="btn btn-sm btn-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('dashboard/produk_hapus/' . $p->produk_id) ?>" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Hapus produk ini?')" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data produk.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- Optional: DataTables -->
<script>
    $(function() {
        $('#produkTable').DataTable({
            responsive: true,
            autoWidth: false,
        });
    });
</script>
