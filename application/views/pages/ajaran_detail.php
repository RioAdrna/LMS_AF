<br>
    <div class="content">
       <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12"> 
               <div class="card"> 
                    <div class="card-header border-2">
                        <div class="d-flex justify-content-between">
                        <div class="col-10">
                        <h6><i class="fas fa-info-circle"></i>  Detail Ajaran</h6>
                </div>
                <button onclick="location.replace('<?= base_url('?p=ajaran') ?>')" class="btn btn-danger float"><i class="fa fa-arrow-circle-left"></i> Kembali</button>

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
                        <input type="hidden"  value="<?= $this->input->get('id')?>" id="id">
                <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="kurikulum" class="form-label">Kurikulum</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="text" class="form-control" id="kurikulum" placeholder="Masukan Kurikulum">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="ajaran1" class="form-label">Tahun Ajaran 1</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="text" class="form-control" id="ajaran1" placeholder="Masukan Tahun Ajaran">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="ajaran2" class="form-label">Tahun Ajaran 2</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="text" class="form-control" id="ajaran2" placeholder="Masukan Tahun Ajaran">
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