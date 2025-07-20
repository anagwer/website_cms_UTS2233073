<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Testimonial</b> <small>Kelola Testimonial Pengunjung</small></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                <h3 class="card-title">
                    <i class="fas fa-comment"></i> Data Testimonial
                </h3>
                
            </div>
			
            <div class="card-body">
				<a href="<?= base_url('dashboard/testimonial_tambah') ?>" class="btn btn-success btn-sm mb-3">
                    <i class="fas fa-plus-circle"></i> Tambah Testimonial
                </a>
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                <?php elseif ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                <?php endif; ?>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Pesan</th>
                            <th>Foto</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($testimonial)): ?>
                            <?php $no = 1; foreach ($testimonial as $t): ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($t->testimonial_nama) ?></td>
                                    <td><?= htmlspecialchars($t->testimonial_konten) ?></td>
                                    <td class="text-center">
                                        <?php if ($t->testimonial_foto): ?>
                                            <img src="<?= base_url('gambar/testimonial/' . $t->testimonial_foto) ?>" width="60" class="img-thumbnail">
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center"><?= date('d M Y', strtotime($t->testimonial_tanggal)) ?></td>
                                    <td class="text-center">
                                        <span class="badge <?= $t->testimonial_status === 'publish' ? 'bg-success' : 'bg-warning' ?>">
                                            <?= ucfirst($t->testimonial_status) ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <?php if ($t->testimonial_status == 'publish'): ?>
                                                <a href="<?= base_url('dashboard/testimonial_set_status/' . $t->testimonial_id . '/draft') ?>" class="btn btn-warning">
                                                    <i class="fas fa-eye-slash"></i>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?= base_url('dashboard/testimonial_set_status/' . $t->testimonial_id . '/publish') ?>" class="btn btn-success">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            <?php endif; ?>
                                            <a href="<?= base_url('dashboard/testimonial_edit/' . $t->testimonial_id) ?>" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('dashboard/testimonial_hapus/' . $t->testimonial_id) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus testimonial ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center text-danger">Belum ada data testimonial.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
