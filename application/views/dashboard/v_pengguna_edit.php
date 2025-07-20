<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Pengguna</b> <small>Pengguna Website</small></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 connectedSortable">
                    <a href="<?php echo base_url('dashboard/pengguna'); ?>">
                        <button class="btn btn-sm btn-success">Kembali</button>
                    </a>
                    <br><br>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-users"></i> Pengguna Website <small>Edit Data Pengguna</small>
                            </h3>
                        </div>

                        <div class="card-body">
                            <?php foreach ($pengguna as $p): ?>
                                <form method="post" action="<?php echo base_url('dashboard/pengguna_update'); ?>">
                                    <div class="form-group">
                                        <label>Nama Pengguna</label>
                                        <input type="hidden" name="id" value="<?php echo $p->pengguna_id; ?>">
                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Pengguna..." value="<?php echo set_value('nama', $p->pengguna_nama); ?>" required>
                                        <?php echo form_error('nama'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Email Pengguna</label>
                                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email Pengguna..." value="<?php echo set_value('email', $p->pengguna_email); ?>" required>
                                        <?php echo form_error('email'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Username Pengguna</label>
                                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username Pengguna..." value="<?php echo set_value('username', $p->pengguna_username); ?>" required>
                                        <?php echo form_error('username'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Password Pengguna</label>
                                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password Pengguna...">
                                        <small>Kosongkan apabila tidak ingin merubah password</small>
                                        <?php echo form_error('password'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Level Pengguna</label>
                                        <select name="level" class="form-control" required>
                                            <option value="">-- Pilih Level --</option>
                                            <option value="admin" <?php echo ($p->pengguna_level == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                            <option value="penulis" <?php echo ($p->pengguna_level == 'penulis') ? 'selected' : ''; ?>>Penulis</option>
                                        </select>
                                        <?php echo form_error('level'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Status Pengguna</label>
                                        <select name="status" class="form-control" required>
                                            <option value="">-- Pilih Status --</option>
                                            <option value="1" <?php echo ($p->pengguna_status == 1) ? 'selected' : ''; ?>>Aktif</option>
                                            <option value="0" <?php echo ($p->pengguna_status == 0) ? 'selected' : ''; ?>>Tidak Aktif</option>
                                        </select>
                                        <?php echo form_error('status'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Update" class="btn btn-block btn-primary">
                                    </div>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>