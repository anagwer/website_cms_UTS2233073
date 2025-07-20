<!--/ Blog Header Section Start /-->
<div class="intro intro-single route bg-image" style="background-image: url(<?php echo base_url(); ?>assets_frontend/img/overlay-bg.jpg)">
      <div class="overlay-mf" style="background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container text-center">
                <h1 class="intro-title mb-3">Artikel Blog</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>" class="text-gold">
                                <i class="fas fa-home mr-1"></i> Beranda
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url('blog'); ?>" class="text-gold">Berita</a>
                        </li>
                        <li class="breadcrumb-item active text-light">Artikel</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--/ Blog Header Section End /-->

<!--/ Blog Content Section Start /-->
<section class="blog-wrapper sect-pt4 pb-5" id="blog">
    <div class="container">
        <div class="row">
            <main class="col-lg-8">
                <?php if(empty($artikel)): ?>
                    <div class="alert alert-info text-center py-4">
                        <i class="fas fa-info-circle fa-2x mb-3"></i>
                        <h3>Belum Ada Artikel</h3>
                        <p class="mb-0">Tidak ada artikel yang ditemukan</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($artikel as $a): ?>
                        <article class="post-box mb-5">
                            <?php if($a->artikel_sampul != ""): ?>
                                <div class="post-thumb mb-4">
                                    <a href="<?php echo base_url($a->artikel_slug); ?>">
                                        <img src="<?php echo base_url('gambar/artikel/' . $a->artikel_sampul); ?>" 
                                             class="img-fluid rounded" 
                                             alt="<?php echo htmlspecialchars($a->artikel_judul); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="post-meta">
                                <h2 class="post-title">
                                    <a href="<?php echo base_url($a->artikel_slug); ?>" class="text-dark">
                                        <?php echo htmlspecialchars($a->artikel_judul); ?>
                                    </a>
                                </h2>
                                
                                <div class="d-flex flex-wrap align-items-center meta-info">
                                    <span class="mr-3">
                                        <i class="fas fa-user mr-1 text-gold"></i>
                                        <?php echo htmlspecialchars($a->pengguna_nama); ?>
                                    </span>
                                    <span class="mr-3">
                                        <i class="fas fa-calendar-alt mr-1 text-gold"></i>
                                        <?php echo date('d M Y', strtotime($a->artikel_tanggal)); ?>
                                    </span>
                                    <span>
                                        <i class="fas fa-tag mr-1 text-gold"></i>
                                        <a href="<?php echo base_url('kategori/' . $a->kategori_slug); ?>" class="text-muted">
                                            <?php echo htmlspecialchars($a->kategori_nama); ?>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="post-excerpt mt-3">
                                <?php echo character_limiter(strip_tags($a->artikel_konten), 200); ?>
                                <a href="<?php echo base_url($a->artikel_slug); ?>" class="read-more">Baca Selengkapnya</a>
                            </div>
                        </article>
                    <?php endforeach; ?>

                    <nav aria-label="Page navigation">
                        <?php echo $this->pagination->create_links(); ?>
                    </nav>
                <?php endif; ?>
            </main>

            <aside class="col-lg-4">
                <?php $this->load->view('frontend/v_sidebar'); ?>
            </aside>
        </div>
    </div>
</section>
<!--/ Blog Content Section End /-->

<!-- Custom Styles -->
<style>
    /* Blog Post Styling */
    .post-box {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        margin-bottom: 30px;
    }
    
    .post-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }
    
    .post-thumb img {
        width: 100%;
        height: auto;
        transition: transform 0.5s ease;
    }
    
    .post-box:hover .post-thumb img {
        transform: scale(1.03);
    }
    
    .post-meta {
        padding: 1.5rem;
    }
    
    .post-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .post-title a {
        color: #4e3b17;
        text-decoration: none;
        transition: color 0.3s;
    }
    
    .post-title a:hover {
        color: #e5d7a3;
    }
    
    .meta-info {
        font-size: 0.9rem;
        color: #6c757d;
        margin-bottom: 1rem;
    }
    
    .post-excerpt {
        padding: 0 1.5rem 1.5rem;
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
    
    .read-more:hover {
        text-decoration: underline;
    }
    
    /* Pagination Styling */
    .pagination {
        justify-content: center;
        margin-top: 2rem;
    }
    
    .page-item.active .page-link {
        background-color: #4e3b17;
        border-color: #4e3b17;
    }
    
    .page-link {
        color: #4e3b17;
        border: 1px solid #dee2e6;
        margin: 0 5px;
    }
    
    .page-link:hover {
        color: #e5d7a3;
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }
</style>