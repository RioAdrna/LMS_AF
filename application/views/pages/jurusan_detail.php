<br>
    <div class="content">
       <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12"> 
               <div class="card"> 
                    <div class="card-header border-2">
                        <div class="d-flex justify-content-between">
                        <div class="col-10">
                        <h6><i class="fas fa-info-circle"></i>  Detail Jurusan</h6>
                </div>
                <div class="col-2">
                  <a href="<?= base_url('?p=jurusan')?>" class="btn btn-danger" style="float:right;">
                  <i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
            <div class="row mb-3">
             <div class="col-md-4 col-xs-6">
               <label for="jurusan" class="form-label">Nama Jurusan</label>
             </div>
             <div class="col-md-8 col-xs-6">
              <input type="text" class="form-control" id="jurusan" placeholder="Masukan Nama Jurusan">
              </div>
            </div>
            <div class="row mb-3">
             <div class="col-md-4 col-xs-6">
              <label for="ajaran" class="form-label">Tahun Ajaran</label>
              </div>
             <div class="col-md-8 col-xs-6">
              <select class="form-control" id="ajaran" style="width:100%">
                <option></option>
                <?php
                           $data = $this->mjurusan->select_ajaran($this->input->get("q"))->result();

                           foreach($data as $data):
                            echo "<option value='$data->id_ajaran'>$data->tahun_ajaran1</option>";
                               //<option value="id_mapel">Nama Matapelajaran</option>
                           endforeach;
                           ?>
              </select>
            </div>

          </div>
              <div class="row mb-3">
                      <div class="col-md-12 col-xs-12">
                          <button id="save" class="btn btn-primary float-end"><i class="fa fa-save"></i> Simpan</button>
                      </div>
               </div>

                        </div>
                    </div>
               </div>
            </div>
       </div>
    </div>