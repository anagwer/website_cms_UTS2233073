<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Website CMS | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Custom plugins -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
            <!-- user header Dropdown Menu -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="<?php echo base_url(); ?>assets/dist/img/Logo.jpg" class="user-image" alt="User Image">
                        Hak Akses : <b><?php echo $this->session->userdata('level') ?></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url() . 'dashboard/profil' ?>" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profil
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url() . 'dashboard/keluar' ?>" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> Keluar
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?php echo base_url(); ?>assets/dist/img/Logo.jpg" alt="website CMS" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">VANLYBAKERY</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url(); ?>assets/dist/img/Logo.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <?php
                        $id_user = $this->session->userdata('id');
                        $user = $this->db->query("SELECT * FROM pengguna WHERE pengguna_id='$id_user'")->row(); ?>
                        <a href="#" class="d-block"><?php echo $user->pengguna_nama; ?></a>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <!-- Menu Dashboard -->
                        <li class="nav-item mb-1">
                            <a href="<?php echo base_url('dashboard') ?>" class="nav-link <?php echo ($this->uri->segment(2) == '' || $this->uri->segment(2) == 'index') ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>DASHBOARD</p>
                            </a>
                        </li>

                        <?php if ($this->session->userdata('level') == "admin"): ?>
                            <!-- Header -->
                            <li class="nav-header text-uppercase text-muted">Manajemen Konten</li>

                            <!-- Produk -->
                            <li class="nav-item mb-1">
                                <a href="<?php echo base_url('dashboard/produk') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'produk') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>PRODUK</p>
                                </a>
                            </li>

                            <!-- Kategori -->
                            <li class="nav-item mb-1">
                                <a href="<?php echo base_url('dashboard/kategori') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'kategori') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-th-large"></i>
                                    <p>KATEGORI</p>
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- Artikel -->
                        <li class="nav-item mb-1">
                            <a href="<?php echo base_url('dashboard/artikel') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'artikel') ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>ARTIKEL</p>
                            </a>
                        </li>

                        <?php if ($this->session->userdata('level') == "admin"): ?>
                            <!-- Pages -->
                            <li class="nav-item mb-1">
                                <a href="<?php echo base_url('dashboard/pages') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'pages') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>PAGES</p>
                                </a>
                            </li>

                            <!-- Layanan -->
                            <li class="nav-item mb-1">
                                <a href="<?php echo base_url('dashboard/layanan') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'layanan') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-concierge-bell"></i>
                                    <p>LAYANAN</p>
                                </a>
                            </li>

                            <!-- Portofolio -->
                            <li class="nav-item mb-1">
                                <a href="<?php echo base_url('dashboard/portofolio') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'portofolio') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-folder-open"></i>
                                    <p>PORTOFOLIO</p>
                                </a>
                            </li>

                            <!-- Testimonial -->
                            <li class="nav-item mb-1">
                                <a href="<?php echo base_url('dashboard/testimonial') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'testimonial') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-comment-alt"></i>
                                    <p>TESTIMONIAL</p>
                                </a>
                            </li>

                            <!-- Pengguna -->
                            <li class="nav-item mb-1">
                                <a href="<?php echo base_url('dashboard/pengguna') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'pengguna') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>PENGGUNA</p>
                                </a>
                            </li>

                            <!-- Pengaturan -->
                            <li class="nav-item mb-3">
                                <a href="<?php echo base_url('dashboard/pengaturan') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'pengaturan') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>PENGATURAN WEBSITE</p>
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- Header -->
                        <li class="nav-header text-uppercase text-muted">Akun</li>

                        <!-- Profil -->
                        <li class="nav-item mb-1">
                            <a href="<?php echo base_url('dashboard/profil') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'profil') ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>PROFIL</p>
                            </a>
                        </li>

                        <!-- Ganti Password -->
                        <li class="nav-item mb-1">
                            <a href="<?php echo base_url('dashboard/ganti_password') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'ganti_password') ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-lock"></i>
                                <p>GANTI PASSWORD</p>
                            </a>
                        </li>

                        <!-- Keluar -->
                        <li class="nav-item">
                            <a href="<?php echo base_url('dashboard/keluar') ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>KELUAR</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>
