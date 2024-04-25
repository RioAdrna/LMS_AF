<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/logo/alfalah.png') ?>">
        <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo/alfalah.png') ?>">
        <title>LeMaS Al-falah</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="<?= base_url('assets/frontend/css/bootstrap.min.css')?>" rel="stylesheet">

        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <link href="<?= base_url('assets/frontend/css/bootstrap-icons.css')?>" rel="stylesheet">

        <link href="<?= base_url('assets/frontend/css/templatemo-topic-listing.css')?>" rel="stylesheet">   
        
           
<!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->
    </head>
    
    <body id="top">
        <main>
      <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="">
        <img src="<?= base_url('assets/img/logo/logo_lemas.png') ?>" class="navbar-brand" alt="main_logo" width="190px" height="10%">
                    <!-- <i class="bi-back"></i>
                    <span>LeMaS Al-Falah</span> -->
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#!">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#?">Tahapan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#%">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="<?= base_url('login') ?>"><i class="fas fa-user-lock"></i>&nbsp; Login</a>
                        </li>

                    </ul>

                    <div class="d-none d-lg-block">
                    <a href="<?= base_url('login') ?>" class="navbar-icon bi-person"></a>
                    </div>
                </div>
            </div>
        </nav>


        <section class="hero-section d-flex justify-content-center align-items-center" id="!">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 mx-auto">
                            <h1 class="text-black text-center">Selamat Datang</h1>

                            <h6 class="text-center">LeMaS SMK Al-Falah</h6>

                            
                        </div>
                               
                    </div>
                </div>
            </section>

            <section class="featured-section">
                <div class="container">
                    <div class="row justify-content-center">


                        <div class="col-lg-7 col-12">
                            <div class="custom-block custom-block-overlay">
                            <div class="d-flex flex-column h-100">
                                    <!-- <img src="" class="custom-block-image img-fluid" alt=""> -->

                                    <div class="custom-block-overlay-text d-flex">
                                        <div>
                                            <h5 class="text-white mb-2">Informasi</h5>

                                            <p class="text-white">LeMaS SMK Al-Falah adalah perangkat lunak yang mengatur penyampaian materi pembelajaran</p>
                                            <p class="text-white">Silahkan Login Dan Mulai Belajar</p>
                                            <h8 class="text-white">Belum Punya Akun? silahkan Registrasi &nbsp;</h8>
                                            <a href="<?= base_url('login') ?>" class="btn custom-btn mt-0 mt-lg-3">Registrasi</a>
                                        </div>

                                        <span class="badge bg-finance rounded-pill ms-auto">!</span>
                                    </div>

                                    <div class="section-overlay"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="timeline-section section-padding" id="?">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="text-white mb-4">Bagaimana Cara Menggunakannya?</h1>
                        </div>

                        <div class="col-lg-10 col-12 mx-auto">
                            <div class="timeline-container">
                                <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                    <div class="list-progress">
                                        <div class="inner"></div>
                                    </div>

                                    <li>
                                        <h4 class="text-white mb-3">Step 1</h4>

                                        <p class="text-white">Silahkan login terlebih dahulu, dan jika belum memiliki akun anda silahkan register terlebih dahulu dengan klik tombol register</p>
                                        <div class="icon-holder">
                                          <i class="bi-search"></i>
                                        </div>
                                    </li>
                                    
                                    <li>
                                        <h4 class="text-white mb-3">Step 2</h4>

                                        <p class="text-white">Setelah login berhasil anda akan dibawa kedalam tampilan LMS dan sudah bisa mengakses LMS tersebut</p>

                                        <div class="icon-holder">
                                          <i class="bi-bookmark"></i>
                                        </div>
                                    </li>

                                    <li>
                                        <h4 class="text-white mb-3">Step 3</h4>

                                        <p class="text-white">Mudah Bukan? ayo login dan coba fitur LMS untuk mempermudah belajar anda</p>

                                        <div class="icon-holder">
                                          <i class="bi-book"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contact-section section-padding section-bg" id="%">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-5">Kontak</h2>
                        </div>

                        <div class="col-lg-6 mb-3 mb-lg-0">
            <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.06341695084!2d107.61052507499608!3d-6.883006893115917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6fcc662a3a3%3A0xc748beaea7a82903!2sSMK%20AL%20FALAH%20BANDUNG!5e0!3m2!1sid!2sid!4v1709216739138!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="col-lg-6">
            <h4 class="mb-3">Alamat</h4>
            <p>Jl.Cisitu Baru No.52, Kel.Dago, Kec.Coblong, Kota Bandung</p>
            <hr>
            <p class="d-flex align-items-center mb-1">
                <span class="me-2">Phone</span>
                <a href="#" class="site-footer-link">(022) 2530018</a>
            </p>
            <p class="d-flex align-items-center">
                <span class="me-2">WhatsApp</span>
                <a href="#" class="site-footer-link">085100972096</a>
            </p>
        </div>

                        <div class="col-lg-3 col-md-6 col-12 mx-auto">
                            
                        </div>

                    </div>
                </div>
            </section>


        </main>

        <footer class="footer py-3">
      <div class="container">
           <div class="row">

           <div class="col-lg-12 col-12">
                <div class="text-center">
                    <p class="copyright-text">Copyright &copy; 2024 SMKS AL-FALAH BANDUNG . All rights reserved</p>
                    <p class="copyright-text">Developed by <a rel="nofollow" href="#">Rio Adriana</a> Supported by <a rel="nofollow" href="#">WeiTECH Indonesia</a></p>
                </div>
            </div>
           </div>
      </div>
      <div class="bottom-footer-area d-flex justify-content-between align-items-center">
            <!-- Follow Us -->
            <div class="follow-us">
                &nbsp;<span>Follow us</span>&nbsp;
                <a href="https://www.tiktok.com/@smk.al.falah.band?_t=8j9XZVTtmBb&_r=1" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/smkalfalahbdg?igsh=cjdlcjhqbGpzZ3Ro" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                <a href="https://youtube.com/@smkalfalahbandung1365?si=EUbUoRpdmDr_eO7v" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a>
            </div>
        </div>
        </footer>
        <!-- JAVASCRIPT FILES -->
        <script src="<?= base_url('assets/frontend/js/jquery.min.js')?>"></script>
        <script src="<?= base_url('assets/frontend/js/bootstrap.bundle.min.js')?>"></script>
        <script src="<?= base_url('assets/frontend/js/jquery.sticky.js')?>"></script>
        <script src="<?= base_url('assets/frontend/js/vanillajs-scrollspy.min.js')?>"></script>
        <script src="<?= base_url('assets/frontend/js/custom.js')?>"></script>

    </body>
</html>
