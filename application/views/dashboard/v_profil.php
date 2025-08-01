<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Pengguna</b> <small>Profil Pengguna</small></h1>
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
                                <i class="fas fa-user"></i> Profil Pengguna <small>Update Profil Pengguna</small>
                            </h3>
                        </div>

                        <div class="card-body">
                            <?php if (isset($_GET['alert']) && $_GET['alert'] == "sukses"): ?>
                                <div class="alert alert-success">Profil Pengguna Berhasil Diupdate!</div>
                            <?php endif; ?>

                            <?php foreach ($pengguna as $p): ?>
                                <form action="<?php echo base_url('dashboard/profil_update'); ?>" method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $p->pengguna_username; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Level Pengguna</label>
                                        <input type="text" name="level" class="form-control" value="<?php echo $p->pengguna_level; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama..." value="<?php echo set_value('nama', $p->pengguna_nama); ?>">
                                        <?php echo form_error('nama'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email..." value="<?php echo set_value('email', $p->pengguna_email); ?>">
                                        <?php echo form_error('email'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Update" class="btn btn-success btn-block">
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