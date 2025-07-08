<br>
    <div class="content">
       <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12"> 
               <div class="card"> 
                    <div class="card-header border-2">
                        <div class="d-flex justify-content-between">
                        <div class="col-10">
                        <h6><i class="fas fa-info-circle"></i>  Detail Guru</h6>
                </div>
                <div class="col-2">
                  <a href="<?= base_url('?p=guru')?>" class="btn btn-danger" style="float:right;">
                  <i class="fa fa-arrow-circle-left"></i> Kembali</a>
                </div>
                  <!-- <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="sdropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Materi</a></li>
                      <li><a class="dropdown-item border-radius-md" href="<?= base_url('?p=tugas_arsip')?>">Arsip Materi</a></li>
                    </ul>
                  </div> -->
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
                  <div class="card-body">
                    <div class="col-md-12">
                        <input type="file" class="form-control" id="jpeg" name="jpeg">
                        <input type="hidden" id="nm_file">
                      </div>
                  </div>
                  <!-- <br>
                  <div class="row">
                    <div class="text-secondary fw-bold text-center" id="nama_personal" ></div>
                  </div> -->
                  <div class="row">
                    <div class="text-secondary fw-bold text-center">
                      <span>ID:</span>
                     <span id="id_guru"></span>
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
                    <h4 class="text-right">EDIT PROFILE</h4>
                </div>
                <hr>
                <br>
                <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="nm_guru" class="form-label">Nama</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="text" class="form-control" id="nm_guru" placeholder="Masukan Nama">
            </div>
          </div>
                <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="nip_guru" class="form-label">NIP</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="text" class="form-control" id="nip_guru" placeholder="Masukan NIP">
            </div>
          </div>
                <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="nik_guru" class="form-label">NIK</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="number" class="form-control" id="nik_guru" placeholder="Masukan NIK">
            </div>
          </div>
                <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="tmt_lahir" class="form-label">Tempat Lahir</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="text" class="form-control" id="tmt_lahir" placeholder="Masukan Tempat Lahir">
            </div>
          </div>
                <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="date" class="form-control" id="tgl_lahir" placeholder="Masukan Tanggal Lahir">
            </div>
          </div>
                <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="alamat_guru" class="form-label">Alamat</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="text" class="form-control" id="alamat_guru" placeholder="Masukan Alamat">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            </div>
            <div class="col-md-8 col-xs-6">
            <select class="form-select" id="jenis_kelamin" >
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>
                <!-- <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="gender" class="form-label">Jenis Kelamin</label>
            </div>
            <div class="col-md-8 col-xs-6">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="L">
                <label class="form-check-label" for="L">
                Laki-Laki
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="P">
                <label class="form-check-label" for="P">
                Perempuan
                </label>
                </div>
            </div>
          </div> -->
                <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="hp_guru" class="form-label">No HP</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="text" class="form-control" id="hp_guru" placeholder="Masukan No HP">
            </div>
          </div>
                <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="agama" class="form-label">Agama</label>
            </div>
            <div class="col-md-8 col-xs-6">
            <select class="form-select" id="agama" aria-label="Default select example">
                <!-- <option selected>---------</option> -->
                <option>Islam</option>
                <option>Kristen</option>
                <option>Budha</option>
                <option>Hindu</option>
                <option>Islam Cina</option>
            </select>
            </div>
          </div>
                <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="email_guru" class="form-label">Email</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="text" class="form-control" id="email_guru" placeholder="Masukan Email">
            </div>
          </div>
                <!-- <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="password" class="form-label">Password</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="password" class="form-control" id="password" placeholder="Masukan Password">
            </div>
          </div> -->
          <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="publikasi" class="form-label">Status</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <select class="form-control" id="publikasi" >
                <option value="Y">Aktif</option>
                <option value="N">Tidak Aktif</option>
              </select>
            </div>
            </div>
        <br>
        <div class="row mb-3">
                      <div class="col-md-12 col-xs-12">
                          <button id="save" class="btn btn-primary float-end"><i class="fa fa-save"></i> Simpan</button>
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
    <br>
</div>
</div>