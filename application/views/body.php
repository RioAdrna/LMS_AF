<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <br>
            <a class="navbar-brand ps-3 " href="index.html">
            <i class="fas fa-chalkboard" style="color:#1E90FF"></i>&nbsp;
                <span>LMS AL-FALAH</span>
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-circle fa-xl" style="color:white;"></i>
                </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('?p=profile')?>"><i class="fas fa-user"></i>&nbsp;Profil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?= base_url('cas/log/logout') ?>"><i class="fas fa-sign-out"></i>&nbsp;Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <hr>
                            <a class="nav-link" href="<?= base_url('?p=dashboard')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Beranda
                            </a>
                            <a class="nav-link" href="<?= base_url('?p=pengumuman')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                                Pengumuman
                            </a>
                           <hr>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Tugas & Materi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url('?p=tugas')?>">- Tugas</a>
                                    <a class="nav-link" href="<?= base_url('?p=materi')?>">- Materi</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="<?= base_url('?p=jadwal')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                                Jadwal Kelas
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Guru & Siswa
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url('?p=guru')?>">- Guru</a>
                                    <a class="nav-link" href="<?= base_url('?p=siswa')?>">- Siswa</a>
                                </nav>
                            </div>
                            <hr>
        <?php if($this->session->userdata('level') == "0"){ ?>

                            <a class="nav-link" href="<?= base_url('?p=kelas')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-th-large"></i></div>
                                Kelas
                            </a>
                            <a class="nav-link" href="<?= base_url('?p=jurusan')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-th-list"></i></div>
                                Jurusan
                            </a>
                            <a class="nav-link" href="<?= base_url('?p=mapel')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                 MataPelajaran
                            </a>
                            <a class="nav-link" href="<?= base_url('?p=ajaran')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                 Ajaran
                            </a>
          <?php } ?>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer ps-3">
                    <a class="nav-link" href="<?= base_url('cas/log/logout') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i> Logout</div>
                            </a>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <!-- <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main> -->
                 <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <?php
       $halaman = $this->input->get('p');

          if($halaman){
       
           if(file_exists(APPPATH."views/pages/$halaman.php" ))
           $this->load->view("pages/$halaman");
           else 
           
           echo "
           <div class='container-fluid dashboard-default-sec'>
              <div class='row'>
                <div class='col-xl-12'> 
                  <div  class='alert bg-white row text-dark'>
                  
                    <div class='col-md-12 '>
                        <h3 class='text-danger'><i class='fa fa-exclamation-triangle'></i> ERROR 404</h3>
                        <hr> 
                        Halaman tidak tersedia.
                        Beberapa Penyebab Halaman ini tidak bisa ditampilkan, antara lain:
                        <ol>
                        <li>Halaman ini belum dikembangkan</li>
                        <li>Kesalahan alamat permohonan akses halaman </li>
                        <li>Kesalahan jaringan</li>
                        </ol> 
                        silahkan kunjungi halaman ini dilain waktu.<br> 
                        Terimakasih
                      </div>
                    </div>
                </div>
              </div>
            </div>
                  ";
           // echo "[ERROR 404] Halaman tidak ditemukan";
           
          }
         else
           $this->load->view("pages/dashboard");
        ?>
            </div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; LeMaS Al-Falah 2024</div>
                            <div>
                                
                                <!-- <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a> -->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script>
            var base_url = "<?= base_url()?>"
            </script>
        <script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js')?>"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url ('js/scripts.js')?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url ('assets/demo/chart-area-demo.js')?>"></script>
        <script src="<?= base_url ('assets/demo/chart-bar-demo.js')?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url ('js/datatables-simple-demo.js')?>"></script>
        <script src="<?= base_url('assets/vendor/DataTables/datatables.min.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/plugins/fontawesome/js/all.min.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/vendor/select2/dist/js/select2.min.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor5/ckeditor.js')?>"></script>
        <script src="<?= base_url('assets/vendor/sweetalert1/sweetalert.min.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/plugins/sweetalert/sweetalert.min.js')?>"></script>
        <script src="<?= base_url("pages/".$this->input->get('p')).".js" ?>"></script>
        <script src="<?= base_url("assets/plugins/filepond/plugins/filepond-plugin-file-validate-type.js")?>"></script>
        <script src="<?= base_url("assets/plugins/filepond/plugins/filepond-plugin-file-validate-size.js")?>"></script>
        <script src="<?= base_url("assets/plugins/filepond/plugins/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js")?>"></script>
        <script src="<?= base_url("assets/plugins/filepond/plugins/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js")?>"></script>
        <script src="<?= base_url("assets/plugins/filepond/dist/filepond.min.js") ?>"></script>

    </body>
