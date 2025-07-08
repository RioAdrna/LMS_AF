<br>
    <div class="content">
       <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12"> 
               <div class="card"> 
                    <div class="card-header border-2">
                        <div class="d-flex justify-content-between">
                        <div class="col-10">
                        <h6><i class="fas fa-info-circle"></i>  Profile</h6>
                </div>
            

                <!-- <di class="col-2 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="sdropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Materi</a></li>
                      <li><a class="dropdown-item border-radius-md" href="<?= base_url('?p=tugas_arsip')?>">Arsip Materi</a></li>
                    </ul>
                  </div>
                </di> -->
                         <!-- Button trigger modal -->
                       
                        </div>
                    </div>
                        <div class="card-body" id="load_data">
        <input type="hidden" value="<?= $this->input->get('id')?>" id="id">  

<!-- Tab panes -->
<div class="tab-content">
  
  <div class="tab-pane active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="modal-content">
      <div class="modal-header">
      
      <div class="modal-body">
        <div class="row gutters-sm">
            <div class="col-md-3 mb-3">
              <div class="card">
                <div class="card-header">
                <h6 class="card-title"><i class="fas fa-images"></i>&nbsp;FOTO</h6>
                </div>
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  <img id="img_logo" src="<?= base_url("assets/img/avatars/no-image.png")?>" alt="Admin" class="rounded-square" width="170" height="231">
                  </div>
                  <!-- <div class="card-body">
                    <div class="col-md-12">
                        <input type="file" class="form-control" id="jpeg" name="jpeg">
                        <input type="hidden" id="nm_file">
                      </div>
                  </div> -->
                  <br>
                  <div class="row">
                    <div class="text-secondary fw-bold text-center" id="nama_personal" ></div>
                  </div>
                  <div class="row">
                    <div class="text-secondary fw-bold text-center">
                      <span>ID:</span>
                     <span id="id_guru" ></span>
                     <input type="hidden" id="id_hd">
                     <input type="hidden"  value="<?= $this->input->get('id')?>" id="id">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-9 mb-9">
              <div class="card">
                <div class="card-header">
                <h6 class="card-title"><i class="fas fa-exclamation"></i> Identitas </h6>
                </div>
                
                <div class="card-body">
                  

                  <div class="tab-content p-3  " id="nav-tabContent">

                  <!-- IDENTITAS -->
                  <div class="col-md-12 border-right">
            <div class="p-3 py-1">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">DETAIL PROFILE</h4>
                </div>
                <hr>
                <br>
                <div class="row border-start border-end">
                          <div class="col-sm-4">
                            <h6 class="mb-0 text-primary">NIP</h6>
                          </div>
                          <div class="col-sm-8 text-secondary border-start" id="nip" ></div>
                        </div>
                        <hr>
                        <div class="row border-start border-end">
                          <div class="col-sm-4">
                            <h6 class="mb-0 text-primary">NIK</h6>
                          </div>
                          <div class="col-sm-8 text-secondary border-start" id="nik">
                          </div>
                        </div>
                        <hr>
                        <div class="row border-start border-end">
                          <div class="col-sm-4">
                            <h6 class="mb-0 text-primary">Alamat</h6>
                          </div>
                          <div class="col-sm-8 text-secondary border-start" id="alamat"></div>
                        </div>
                        <hr>
                        <div class="row border-start border-end">
                          <div class="col-sm-4">
                            <h6 class="mb-0 text-primary">Telp/HP</h6>
                          </div>
                          <div class="col-sm-8 text-secondary border-start" id="telp_hp"></div>
                        </div>
                        <hr>
                        <div class="row border-start border-end">
                          <div class="col-sm-4">
                            <h6 class="mb-0 text-primary">Email</h6>
                          </div>
                          <div class="col-sm-8 text-secondary border-start" id="email"></div>
                        </div>
                        <hr>
                        <div class="row border-start border-end">
                          <div class="col-sm-4">
                            <h6 class="mb-0 text-primary">Jenis Kelamin</h6>
                          </div>
                          <div class="col-sm-8 text-secondary border-start" id="gender"></div>
                        </div>
                        <hr>
                        <div class="row border-start border-end">
                          <div class="col-sm-4">
                            <h6 class="mb-0 text-primary">Tempat & Tanggal Lahir</h6>
                          </div>
                          <div class="col-sm-8 text-secondary border-start">
                            <span id="tmpt_lahir">&</span>
                            <span id="tgl_lahir"></span>
                          </div>
                        </div>
                        <hr>
                        <div class="row border-start border-end">
                          <div class="col-sm-4">
                            <h6 class="mb-0 text-primary">Agama</h6>
                          </div>
                          <div class="col-sm-8 text-secondary border-start" id="agama"></div>
                        </div>
                        <hr>                    
                       
        <div class="row mb-3">
                      <div class="col-md-12 col-xs-12">
                          <!-- <button onclick="location.replace('<?= base_url('?p=guru_edit&id')?>')" class="btn btn-danger float-end"><i class="fa fa-edit"></i> Edit</button> -->
                      </div>
               </div>
                    <!-- BATAS RUANG IDENTITAS -->

                        </div>
                    </div>
                        </div>
                </div>
                    </div>
                        </div>
                            </div>
            </div>
                        </div>
                    </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
    </div>