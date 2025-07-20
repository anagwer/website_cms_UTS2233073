<!--/ Blog Header Section Start /-->
<div class="intro intro-single route bg-image" style="background-image: url(<?php echo base_url(); ?>assets_frontend/img/overlay-bg.jpg)">
      <div class="overlay-mf" style="background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container text-center">
                <h1 class="intro-title mb-3">HASIL PENCARIAN</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>" class="text-gold"><i class="fas fa-home mr-2"></i>Beranda</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('blog') ?>" class="text-gold">Blog</a>
                        </li>
                        <li class="breadcrumb-item active text-light">"<?= htmlspecialchars($cari) ?>"</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--/ Blog Header Section End /-->

<!-- Hasil Pencarian -->
<section class="search-results py-5">
    <div class="container">
        <div class="row">
            <main class="col-lg-8">
                <?php if (empty($artikel)): ?>
                    <div class="empty-results text-center py-5">
                        <i class="fas fa-search fa-3x mb-4 text-muted"></i>
                        <h3 class="mb-3">Tidak Ada Hasil Ditemukan</h3>
                        <p class="text-muted">Maaf, tidak ditemukan artikel dengan kata kunci "<?= htmlspecialchars($cari) ?>"</p>
                        <a href="<?= base_url('blog') ?>" class="btn btn-primary mt-3">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Blog
                        </a>
                    </div>
                <?php else: ?>
                    <div class="search-info mb-4">
                        <p>Menampilkan <?= count($artikel) ?> hasil untuk pencarian "<strong><?= htmlspecialchars($cari) ?></strong>"</p>
                    </div>
                    
                    <?php foreach ($artikel as $a): ?>
                        <article class="search-result card mb-4 border-0 shadow-sm">
                            <?php if (!empty($a->artikel_sampul)): ?>
                                <div class="result-thumb">
                                    <a href="<?= base_url($a->artikel_slug) ?>">
                                        <img src="<?= base_url('gambar/artikel/' . $a->artikel_sampul) ?>" 
                                             class="card-img-top" 
                                             alt="<?= htmlspecialchars($a->artikel_judul) ?>">
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="card-body">
                                <h2 class="result-title">
                                    <a href="<?= base_url($a->artikel_slug) ?>" class="text-dark">
                                        <?= htmlspecialchars($a->artikel_judul) ?>
                                    </a>
                                </h2>
                                
                                <div class="result-meta d-flex flex-wrap mb-3">
                                    <span class="mr-3">
                                        <i class="fas fa-user mr-1 text-gold"></i>
                                        <?= htmlspecialchars($a->pengguna_nama) ?>
                                    </span>
                                    <span class="mr-3">
                                        <i class="fas fa-calendar-alt mr-1 text-gold"></i>
                                        <?= date('d M Y', strtotime($a->artikel_tanggal)) ?>
                                    </span>
                                    <span>
                                        <i class="fas fa-tag mr-1 text-gold"></i>
                                        <a href="<?= base_url('kategori/' . $a->kategori_slug) ?>" class="text-muted">
                                            <?= htmlspecialchars($a->kategori_nama) ?>
                                        </a>
                                    </span>
                                </div>
                                
                                <div class="result-excerpt">
                                    <?= character_limiter(strip_tags($a->artikel_konten), 200) ?>
                                    <a href="<?= base_url($a->artikel_slug) ?>" class="read-more">Baca selengkapnya</a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                    
                    <nav class="pagination-wrapper" aria-label="Page navigation">
                        <?= $this->pagination->create_links() ?>
                    </nav>
                <?php endif; ?>
            </main>
            
            <aside class="col-lg-4">
                <?php $this->load->view('frontend/v_sidebar'); ?>
            </aside>
        </div>
    </div>
</section>

<!-- CSS Kustom -->
<style>
    /* Header */
    .search-header {
        position: relative;
        padding: 100px 0;
        background-size: cover;
        background-position: center;
    }
    
    .header-content {
        position: relative;
        z-index: 2;
    }
    
    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    }
    
    /* Breadcrumb */
    .breadcrumb {
        background: transparent;
        padding: 0.5rem 0;
    }
    
    .breadcrumb-item a {
        color: #e5d7a3;
        text-decoration: none;
    }
    
    .breadcrumb-item.active {
        color: #f8f9fa;
    }
    
    /* Hasil Pencarian */
    .search-results {
        background: #f9f6f1;
    }
    
    .search-result {
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .search-result:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .result-thumb img {
        width: 100%;
        height: auto;
        transition: transform 0.5s ease;
    }
    
    .search-result:hover .result-thumb img {
        transform: scale(1.03);
    }
    
    .result-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .result-title a {
        color: #4e3b17;
        text-decoration: none;
        transition: color 0.3s;
    }
    
    .result-title a:hover {
        color: #e5d7a3;
    }
    
    .result-meta {
        font-size: 0.9rem;
        color: #6c757d;
    }
    
    .result-excerpt {
        color: #555;
        line-height: 1.7;
    }
    
    .read-more {
        color: #e5d7a3;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        margin-top: 10px;
    }
    
    /* Hasil Kosong */
    .empty-results {
        background: #fff;
        padding: 3rem;
        border-radius: 8px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.05);
    }
    
    /* Pagination */
    .pagination-wrapper {
        margin-top: 2rem;
    }
    
    .pagination .page-item.active .page-link {
        background-color: #4e3b17;
        border-color: #4e3b17;
    }
    
    .pagination .page-link {
        color: #4e3b17;
        border: 1px solid #dee2e6;
    }
    
    /* Responsif */
    @media (max-width: 768px) {
        .search-header {
            padding: 70px 0;
        }
        
        .page-title {
            font-size: 2rem;
        }
    }
</style>