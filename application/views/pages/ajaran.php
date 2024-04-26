<br>
    <div class="content">
       <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12"> 
               <div class="card"> 
                    <div class="card-header border-2">
                        <div class="d-flex justify-content-between">
                        <div class="col-10">
                        <h6> Ajaran <i class="fas fa-exclamation"></i></h6>
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
                         <br>
                        <button id="tambah_data" type="button" class="btn btn-transparant" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus"></i> 
                        </button>
                        </div>
                    </div>
                        <div class="card-body">
                        <table id="tabel_ajaran" class="table table-bordered" style="width:100%">
                            
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Kurikulum</th>
                                        <th>Tahun Ajaran Awal</th>
                                        <th>Tahun Ajaran Akhir</th>
                                        <th>#</th>
                                    </tr>
                                </thead>


                            </table>
                        </div>
                    </div>
               </div>
            </div>
       </div>
    </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i> Tambah Data Ajaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
              <label for="ajaran1" class="form-label">Tahun Ajaran Mulai</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="number" class="form-control" id="ajaran1" placeholder="Masukan Tahun Ajaran Mulai">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="ajaran2" class="form-label">Tahun Ajaran Akhir</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="number" class="form-control" id="ajaran2" placeholder="Masukan Tahun Ajaran Akhir">
            </div>
          </div>
          
      </div>
      <div class="modal-footer">
        <button id="clear" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button id= "simpan_ajaran" type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    </div>
  </div>