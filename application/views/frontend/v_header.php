<!-- application\views\frontend\v_header.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $pengaturan->nama; ?> - <?php echo $pengaturan->deskripsi; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="<?php echo $meta_keyword; ?>" name="keywords">
    <meta content="<?php echo htmlspecialchars($meta_description, ENT_QUOTES); ?>" name="description">

    <!-- Favicons -->
    <link href="<?php echo base_url('gambar/website/' . $pengaturan->logo); ?>" rel="icon">
    <link href="<?php echo base_url('assets_frontend/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('assets_frontend/lib/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Libraries CSS -->
    <link href="<?php echo base_url('assets_frontend/lib/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets_frontend/lib/animate/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets_frontend/lib/ionicons/css/ionicons.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets_frontend/lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets_frontend/lib/lightbox/css/lightbox.min.css'); ?>" rel="stylesheet">

    <!-- Main Styles -->
    <link href="<?php echo base_url('assets_frontend/css/style.css'); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <style>
        :root {
            --brown-dark: #4e3b17;
            --brown-medium: #6d5b3a;
            --gold: #e5d7a3;
            --cream: #f9f6f1;
            --white: #ffffff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 70px;
        }

        .navbar {
            background-color: var(--brown-dark) !important;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 0.5rem 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .navbar-brand {
            color: var(--gold) !important;
            font-weight: 600;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--gold);
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: rotate(15deg);
        }

        .nav-link {
            color: var(--gold) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            margin: 0 0.2rem;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--white);
            transition: width 0.3s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--white) !important;
        }

        .nav-link:hover::before,
        .nav-link.active::before {
            width: 100%;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }

        .navbar-toggler:focus {
            outline: none;
        }

        .navbar-toggler span {
            display: block;
            width: 25px;
            height: 2px;
            background-color: var(--gold);
            margin: 5px 0;
            transition: all 0.3s ease;
        }

        .navbar-toggler[aria-expanded="true"] span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .navbar-toggler[aria-expanded="true"] span:nth-child(2) {
            opacity: 0;
        }

        .navbar-toggler[aria-expanded="true"] span:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        @media (max-width: 991px) {
            .navbar-collapse {
                background-color: var(--brown-dark);
                padding: 1rem;
                border-radius: 5px;
                margin-top: 10px;
            }

            .nav-item {
                margin: 0.5rem 0;
            }

            .nav-link::before {
                display: none;
            }
        }

        .intro-single .breadcrumb-item a,
        .intro-single .breadcrumb-item.active {
            color: white !important;
            opacity: 0.9;
        }

        .intro-single .breadcrumb-item a:hover {
            color: #e5d7a3 !important;
            text-decoration: none;
        }

        .intro-single .breadcrumb-item+.breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.6);
            content: "/";
            padding: 0 8px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Nav Start -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url('gambar/website/' . $pengaturan->logo); ?>" alt="<?php echo $pengaturan->nama; ?>">
                <?php echo $pengaturan->nama; ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') ? 'active' : ''; ?>" href="<?php echo base_url(); ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($this->uri->segment(2) == 'produk') ? 'active' : ''; ?>" href="<?php echo base_url('produk'); ?>">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($this->uri->segment(1) == 'blog') ? 'active' : ''; ?>" href="<?php echo base_url('blog'); ?>">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($this->uri->segment(2) == 'kontak-kami') ? 'active' : ''; ?>" href="<?php echo base_url('page/kontak-kami'); ?>">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($this->uri->segment(2) == 'tentang-kami') ? 'active' : ''; ?>" href="<?php echo base_url('page/tentang-kami'); ?>">Tentang</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo ($this->uri->segment(1) == 'portofolio' || $this->uri->segment(1) == 'testimonial' || $this->uri->segment(1) == 'layanan') ? 'active' : ''; ?>" href="#" id="dropdownPorto" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Lainnya
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownPorto">
                            <a class="dropdown-item" href="<?php echo base_url('portofolio'); ?>">Portofolio</a>
                            <a class="dropdown-item" href="<?php echo base_url('testimonial'); ?>">Testimonial</a>
                            <a class="dropdown-item" href="<?php echo base_url('layanan'); ?>">Layanan</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($this->uri->segment(1) == 'login') ? 'active' : ''; ?>" href="<?php echo base_url('login'); ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav End -->

    <!-- Scroll Effect Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('mainNav');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>

    <!-- Bootstrap JS (jQuery + Popper + Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>