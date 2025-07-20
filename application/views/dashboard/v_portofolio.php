<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Portofolio</b> <small>Kelola Portofolio</small></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title"><i class="fa fa-folder"></i> Data Portofolio</h3>
            </div>
            <div class="card-body">
                <a href="<?= base_url('dashboard/portofolio_tambah'); ?>" class="btn btn-success mb-3">
                    <i class="fa fa-plus"></i> Tambah Portofolio Baru
                </a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tahun</th>
                            <th>Client</th>
                            <th>Durasi</th>
                            <th>Penulis</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($portofolio)) : ?>
                            <?php $no = 1;
                            foreach ($portofolio as $p) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= date('d/m/Y', strtotime($p->portofolio_tanggal)); ?></td>
                                    <td>
                                        <?php echo htmlspecialchars($p->portofolio_judul); ?>
                                        <br>
                                        <small class="text-muted"><?php echo base_url('portofolio/' . $p->portofolio_slug); ?></small>
                                    </td>
                                    <td><?= htmlspecialchars($p->portofolio_kategori); ?></td>
                                    <td><?= $p->portofolio_tahun; ?></td>
                                    <td><?= htmlspecialchars($p->portofolio_client); ?></td>
                                    <td><?= htmlspecialchars($p->portofolio_durasi); ?></td>
                                    <td><?= isset($p->pengguna_nama) ? htmlspecialchars($p->pengguna_nama) : 'Tidak diketahui'; ?></td>
                                    <td>
                                        <?php if (!empty($p->portofolio_sampul)) : ?>
                                            <img src="<?= base_url('gambar/portofolio/' . $p->portofolio_sampul); ?>" width="100" class="img-thumbnail">
                                        <?php else : ?>
                                            Tidak ada gambar
                                        <?php endif; ?>
                                    </td>
                                    <td><?= ucfirst(htmlspecialchars($p->portofolio_status)); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <div class="btn-group ">
                                                <a target="_blank" href="<?= base_url('portofolio/' . $p->portofolio_slug); ?>" class="btn btn-sm btn-success">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <?php if ($this->session->userdata('level') != 'penulis' || $this->session->userdata('id') == $p->portofolio_author): ?>
                                                    <a href="<?= base_url('dashboard/portofolio_edit/' . $p->portofolio_id); ?>" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url('dashboard/portofolio_hapus/' . $p->portofolio_id); ?>" onclick="return confirm('Yakin Hapus Data Ini?')" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="11" class="text-center text-danger">Tidak ada data portofolio</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>