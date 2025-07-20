<!-- application\views\frontend\v_footer.php -->

<!-- Simple Footer Start -->
<footer class="bg-dark text-gold py-4">
    <div class="container">
        <div class="row">
            <!-- Store Info -->
            <div class="col-md-4 mb-4">
                <h5 class="mb-3 color-d"><?php echo $pengaturan->nama; ?></h5>
                <p><i class="fas fa-map-marker-alt mr-2"></i> Grabag, Kab. Magelang</p>
                <p><i class="fas fa-clock mr-2"></i> Buka: 07.00 - 21.00</p>
                <p><i class="fas fa-phone-alt mr-2"></i> +62 889-8564-1923</p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4 mb-4">
                <h5 class="mb-3 color-d">Menu</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="<?php echo base_url(); ?>" class="text-gold">Beranda</a></li>
                    <li class="mb-2"><a href="<?php echo base_url('layanan'); ?>" class="text-gold">Layanan</a></li>
                    <li class="mb-2"><a href="<?php echo base_url('portofolio'); ?>" class="text-gold">Portofolio</a></li>
                    <li class="mb-2"><a href="<?php echo base_url('page/kontak-kami'); ?>" class="text-gold">Kontak</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="col-md-4 mb-4">
                <h5 class="mb-3 color-d">Ikuti Kami</h5>
                <div class="social-icons">
                    <a href="<?php echo $pengaturan->link_instagram; ?>" class="text-gold mr-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="<?php echo $pengaturan->link_facebook; ?>" class="text-gold mr-3"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="https://wa.me/6288985641923" class="text-gold"><i class="fab fa-whatsapp fa-lg"></i></a>
                </div>
            </div>
        </div>
        
        <hr class="border-gold">
        
        <div class="text-center pt-2">
            <p class="small">&copy; <?php echo date('Y'); ?> <?php echo $pengaturan->nama; ?>. All Rights Reserved</p>
        </div>
    </div>
</footer>
<!-- Simple Footer End -->

<!-- Back to Top Button -->
<a href="#" class="btn btn-gold btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</a>

<!-- Simple Styles -->
<style>
    .bg-dark {
        background-color: #4e3b17 !important;
    }
    
    .text-gold {
        color: #e5d7a3;
    }
    
    .border-gold {
        border-color: #e5d7a3 !important;
    }
    
    .btn-back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: none;
    }
    
    .social-icons a {
        transition: all 0.3s;
    }
    
    .social-icons a:hover {
        color: white !important;
        transform: translateY(-3px);
    }

    .color-d {
            color: #e5d7a3 !important;
        }
</style>

<!-- Simple Script -->
<script>
    // Back to top button
    window.addEventListener('scroll', function() {
        var backToTop = document.querySelector('.btn-back-to-top');
        if (window.pageYOffset > 300) {
            backToTop.style.display = 'block';
        } else {
            backToTop.style.display = 'none';
        }
    });
    
    document.querySelector('.btn-back-to-top').addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
    var typed = new Typed(".text-slider", {
        strings: document.querySelector(".text-slider-items").textContent.split(", "),
        typeSpeed: 50,
        loop: true,
        backDelay: 900,
        backSpeed: 30
    });
</script>


<!-- jQuery (pastikan di-load sebelum OwlCarousel) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JS Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(){
        $("#testimonial-mf").owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive:{
                0:{ items:1 },
                768:{ items:1 },
                992:{ items:1 }
            }
        });
    });
</script>

    
</body>
</html>