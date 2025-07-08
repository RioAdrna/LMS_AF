<style>
    @media (max-width: 767.98px) {
    .custom-logo {
        width: 100% !important;
    }
}
@media (min-width: 768px) {
    .custom-logo {
        width: 50% !important;
    }
}

</style>
<div class="container-fluid px-4">
                        <!-- <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> -->
                        <br>
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="card bg-light bg-gradient text-dark mb-4">
                                    <div class="card-body">
                                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start">
                                            <div class="flex-grow-1">
                                                <h4>&nbsp;Halo <?= $this->session->userdata("nama") ?> ,</h4>
                                                <h6>&nbsp;Selamat datang di LMS Al-Falah</h6>
                                            </div>
                                            <img src="<?= base_url('assets/img/logo/logo_lemas.png') ?>" alt="Logo" class="img-fluid mt-3 mt-md-0 custom-logo" style="height: auto;">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                        <div class="card bg-dark text-white mb-4">
                                            <div class="card-body"><h6><i class="fas fa-bell"></i> &nbsp;Pengumuman</h6><hr></div>
                                            <div class="card-body">
                                            <!-- <img src="<?= base_url('assets/img/logo/alfalah.png') ?>" alt="Foto Pengumuman" style="width: 100%; height: auto;"> -->
                                            <!-- <center>
                                                <h6>Konsep</h6>
                                            </center> -->
                                            </div>
                                           
                                        </div>
                                    </div>
    
                                    <div class="col-xl-6 col-md-12">
                                        <div class="card bg-dark text-white mb-4">
                                            <div class="card-body"><h6><i class="fas fa-calendar"></i> &nbsp;Jadwal</h6><hr></div>
                                            <div class="card-body">
                                                <!-- <center>
                                                <span>Nanti disini</span>
                                                </center> -->
                                            </div>
                                           
                                        </div>
                                    </div>
                        </div>
                    </div>

                   

           