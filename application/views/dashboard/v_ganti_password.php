<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <b>Dashboard</b> <small>Control Panel</small>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-lock"></i>
                                Ganti Password <small>Ubah Password Anda</small>
                            </h3>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <?php if (isset($_GET['alert'])): ?>
                                <?php if ($_GET['alert'] == 'gagal'): ?>
                                    <div class="alert alert-danger font-weight-bold text-center">
                                        Maaf, password lama yang Anda masukkan salah!
                                    </div>
                                <?php elseif ($_GET['alert'] == 'sukses'): ?>
                                    <div class="alert alert-success font-weight-bold text-center">
                                        Password Berhasil Diperbaharui !
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <form method="post" action="<?php echo base_url('dashboard/ganti_password_aksi'); ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Password Lama</label>
                                        <input type="password" class="form-control" name="password_lama" placeholder="Masukkan Password Lama Anda" required>
                                        <?php echo form_error('password_lama'); ?>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label>Password Baru</label>
                                        <input type="password" class="form-control" name="password_baru" placeholder="Masukkan Password Baru Anda" required>
                                        <?php echo form_error('password_baru'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" name="konfirmasi_password" placeholder="Ulangi Password Baru Anda" required>
                                        <?php echo form_error('konfirmasi_password'); ?>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" value="Ganti Password">
                                </div>
                            </form>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </section>
            </div>
        </div>
    </section>
    <!--/.content -->
</div>