<!-- application\views\dashboard\v_artikel.php -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Artikel</b> <small>Manajemen Artikel</small></h1>
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
                            <h3 class="card-title"><i class="fas fa-file"></i> Data Artikel</h3>
                        </div>

                        <div class="card-body">
                            <a href="<?php echo base_url('dashboard/artikel_tambah'); ?>">
                                <button class="btn btn-sm btn-success">
                                    Buat Artikel Baru <i class="fas fa-plus"></i>
                                </button>
                            </a>
                            <hr>
<?php
$folder = './gambar/artikel/';

if (is_writable($folder)) {
    echo "Folder $folder bisa ditulis.";
} else {
    echo "Folder $folder TIDAK bisa ditulis!";
}
?>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>Tanggal</th>
                                        <th>Judul Artikel</th>
                                        <th>Penulis Artikel</th>
                                        <th>Kategori Artikel</th>
                                        <th width="10%">Gambar</th>
                                        <th>Status</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($artikel as $a): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td>
                                                <?php echo date('d/m/Y H:i', strtotime($a->artikel_tanggal)); ?>
                                            </td>
                                            <td>
                                                <?php echo htmlspecialchars($a->artikel_judul); ?>
                                                <br>
                                                <small class="text-muted"><?php echo base_url() . $a->artikel_slug; ?></small>
                                            </td>
                                            <td><?php echo htmlspecialchars($a->pengguna_nama); ?></td>
                                            <td><?php echo htmlspecialchars($a->kategori_nama); ?></td>
                                            <td>
                                                <img width="100%" class="img-responsive" src="<?php echo base_url('gambar/artikel/' . $a->artikel_sampul); ?>">
                                            </td>
                                            <td>
                                                <?php if ($a->artikel_status == "publish"): ?>
                                                    <span class="badge badge-success">Publish</span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">Draft</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a target="_blank" href="<?php echo base_url() . $a->artikel_slug; ?>">
                                                    <button class="btn btn-sm btn-success">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </a>

                                                <?php if ($this->session->userdata('level') == 'penulis'): ?>
                                                    <?php if ($this->session->userdata('id') == $a->artikel_author): ?>
                                                        <a href="<?php echo base_url('dashboard/artikel_edit/' . $a->artikel_id); ?>">
                                                            <button class="btn btn-sm btn-warning">
                                                                <i class="nav-icon fas fa-edit"></i>
                                                            </button>
                                                        </a>
                                                        <a href="<?php echo base_url('dashboard/artikel_hapus/' . $a->artikel_id); ?>" onclick="return confirm('Yakin Hapus Data Ini?')">
                                                            <button class="btn btn-sm btn-danger">
                                                                <i class="nav-icon fas fa-trash"></i>
                                                            </button>
                                                        </a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <a href="<?php echo base_url('dashboard/artikel_edit/' . $a->artikel_id); ?>">
                                                        <button class="btn btn-sm btn-warning">
                                                            <i class="nav-icon fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="<?php echo base_url('dashboard/artikel_hapus/' . $a->artikel_id); ?>" onclick="return confirm('Yakin Hapus Data Ini?')">
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="nav-icon fas fa-trash"></i>
                                                        </button>
                                                    </a>
                                                <?php endif; ?>
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
