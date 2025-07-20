<div class="container mt-5">
    <div class="row">
        <?php if (!empty($produk) && is_array($produk)) : ?>
            <?php foreach ($produk as $p): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-lg">
                        <!-- Foto Produk -->
                        <?php if (!empty($p->produk_foto)) : ?>
                            <a href="<?= base_url('produk/detail/' . $p->produk_id); ?>">
                                <img src="<?= base_url('assets/uploads/produk/' . $p->produk_foto); ?>" 
                                     class="card-img-top" 
                                     alt="<?= htmlspecialchars($p->produk_nama); ?>" 
                                     style="object-fit: cover; height: 200px;">
                            </a>
                        <?php else : ?>
                            <a href="<?= base_url('produk/detail/' . $p->produk_id); ?>">
                                <img src="<?= base_url('assets/uploads/no_image.png'); ?>" 
                                     class="card-img-top" 
                                     alt="Tidak ada foto" 
                                     style="object-fit: cover; height: 200px;">
                            </a>
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <!-- Judul dengan batasan karakter -->
                            <h5 class="card-title text-truncate" title="<?= htmlspecialchars($p->produk_nama); ?>">
                                <?= character_limiter(htmlspecialchars($p->produk_nama), 30); ?>
                            </h5>

                            <!-- Harga -->
                            <p class="card-text text-muted">
                                Harga: Rp <?= number_format($p->produk_harga, 0, ',', '.'); ?>
                            </p>

                            <!-- Tombol Detail -->
                            <div class="mt-auto">
                                <a href="<?= base_url('produk/detail/' . $p->produk_id); ?>" 
                                   class="btn btn-primary btn-block">
                                    <i class="fas fa-eye"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada produk tersedia.</p>
            </div>
        <?php endif; ?>
    </div>
</div>