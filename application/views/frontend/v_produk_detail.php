<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-4 p-4">
                <div class="row g-4 align-items-center">

                    <!-- Gambar Produk -->
                    <div class="col-md-5">
                        <?php if (!empty($produk->produk_foto)): ?>
                            <img src="<?= base_url('assets/uploads/produk/'.$produk->produk_foto); ?>"
                                 class="img-fluid rounded-4 shadow"
                                 alt="<?= htmlspecialchars($produk->produk_nama); ?>">
                        <?php else: ?>
                            <img src="<?= base_url('assets/uploads/no_image.png'); ?>"
                                 class="img-fluid rounded-4 shadow"
                                 alt="Tidak ada foto">
                        <?php endif; ?>
                    </div>

                    <!-- Detail Produk -->
                    <div class="col-md-7">
                        <h2 class="fw-bold mb-3"><?= htmlspecialchars($produk->produk_nama); ?></h2>
                        <p class="mb-2"><strong>Kategori:</strong> <?= htmlspecialchars($produk->produk_kategori); ?></p>
                        <p class="mb-2"><strong>Harga:</strong> <span class="text-success fw-semibold">Rp <?= number_format($produk->produk_harga, 0, ',', '.'); ?></span></p>
                        <p class="mb-2"><strong>Lama Pembuatan:</strong> <?= $produk->produk_pembuatan; ?> hari</p>
                        <p class="mb-2"><strong>Status:</strong>
                            <span class="badge bg-<?= ($produk->produk_status == 'aktif') ? 'success' : 'secondary'; ?>">
                                <?= ucfirst(htmlspecialchars($produk->produk_status)); ?>
                            </span>
                        </p>
                        <hr>
                        <p class="text-muted"><?= nl2br(htmlspecialchars($produk->produk_keterangan)); ?></p>

                        <!-- Tombol WhatsApp -->
                        <a href="https://wa.me/6288985641923?text=Saya%20tertarik%20dengan%20produk%20<?= urlencode($produk->produk_nama); ?>.%20Apakah%20masih%20tersedia?"
                           target="_blank"
                           class="btn btn-success btn-lg mt-3 w-100">
                            <i class="fab fa-whatsapp me-2"></i> Pesan via WhatsApp
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
