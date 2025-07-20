<!-- application\views\dashboard\v_layanan.php -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Layanan</b> <small>Kelola Layanan</small></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-briefcase"></i> Data Layanan</h3>
                        </div>

                        <div class="card-body">
                            <a href="<?php echo base_url('dashboard/layanan_tambah'); ?>">
                                <button class="btn btn-sm btn-success">
                                    Tambah Layanan Baru <i class="fas fa-plus"></i>
                                </button>
                            </a>
                            <hr>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>Tanggal</th>
                                        <th>Judul Layanan</th>
                                        <th>Penulis</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($layanan)): ?>
                                        <?php $no = 1; ?>
                                        <?php foreach ($layanan as $l): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo date('d/m/Y H:i', strtotime($l->layanan_tanggal)); ?></td>
                                                <td>
                                                    <?php echo htmlspecialchars($l->layanan_judul); ?>
                                                    <br>
                                                    <small class="text-muted"><?php echo base_url('layanan/' . $l->layanan_slug); ?></small>
                                                </td>
                                                <td><?php echo htmlspecialchars($l->pengguna_nama); ?></td>
                                                <td>
                                                    <?php if (!empty($l->layanan_sampul)): ?>
                                                        <img width="100px" src="<?php echo base_url('gambar/layanan/' . $l->layanan_sampul); ?>" alt="<?php echo htmlspecialchars($l->layanan_judul); ?>">
                                                    <?php else: ?>
                                                        <span class="text-muted">No image</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($l->layanan_status == "publish"): ?>
                                                        <span class="badge badge-success">Publish</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-secondary">Draft</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a target="_blank" href="<?php echo base_url('layanan/' . $l->layanan_slug); ?>" class="btn btn-sm btn-success">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <?php if ($this->session->userdata('level') != 'penulis' || $this->session->userdata('id') == $l->layanan_author): ?>
                                                            <a href="<?php echo base_url('dashboard/layanan_edit/' . $l->layanan_id); ?>" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="<?php echo base_url('dashboard/layanan_hapus/' . $l->layanan_id); ?>" onclick="return confirm('Yakin Hapus Data Ini?')" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data layanan</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>