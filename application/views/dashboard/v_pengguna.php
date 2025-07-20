<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1><b>Data Pengguna</b> <small>Manajemen Pengguna</small></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-users"></i> Data Pengguna
                            </h3>
                        </div>

                        <div class="card-body">
                            <a href="<?php echo base_url('dashboard/pengguna_tambah'); ?>">
                                <button class="btn btn-sm btn-success">
                                    Tambah Pengguna <i class="fas fa-plus"></i>
                                </button>
                            </a>
                            <hr>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($pengguna as $p): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo htmlspecialchars($p->pengguna_nama); ?></td>
                                            <td><?php echo htmlspecialchars($p->pengguna_email); ?></td>
                                            <td><?php echo htmlspecialchars($p->pengguna_username); ?></td>
                                            <td><?php echo htmlspecialchars($p->pengguna_level); ?></td>
                                            <td>
                                                <?php if ($p->pengguna_status == 1): ?>
                                                    Aktif
                                                <?php else: ?>
                                                    Tidak Aktif
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('dashboard/pengguna_edit/' . $p->pengguna_id); ?>">
                                                    <button class="btn btn-sm btn-warning">
                                                        <i class="nav-icon fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="<?php echo base_url('dashboard/pengguna_hapus/' . $p->pengguna_id); ?>" onclick="return confirm('Yakin Hapus Data Ini?')">
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="nav-icon fas fa-trash"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>