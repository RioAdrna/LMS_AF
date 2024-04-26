<br>
    <div class="content">
       <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12"> 
               <div class="card"> 
                    <div class="card-header border-2">
                        <div class="d-flex justify-content-between">
                        <div class="col-10">
                        <h6> Matapelajaran <i class="fas fa-exclamation"></i></h6>
                </div>
                <div class="col-2 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="sdropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;"  data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Matapelajaran</a></li>
                      <li><a class="dropdown-item border-radius-md" href= "<?= base_url('?p=mapel_arsip')?>" >Arsip Matapelajaran</a></li>
                    </ul>
                  </div>
                </div>
                         <!-- Button trigger modal -->
                         <!-- <br>
                        <button id="tambah_data" type="button" class="btn btn-transparant" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus"></i> 
                        </button> -->
                        </div>
                    </div>
                        <div class="card-body">
                        <table id="mapel" class="table table-bordered" style="width:100%">
                            
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Matapelajaran</th>
                                        <th>Note Patapelajaran</th>
                                        <th>Status</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
               </div>
            </div>
       </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-book"></i> Tambah Matapelajaran</h5>
      </div>
      <div class="modal-body">
      <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="muatan" class="form-label">Muatan</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input type="text" class="form-control" id="muatan" placeholder="Masukan Muatan Matapelajaran">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="nm_mapel" class="form-label">Matapelajaran</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <input class="form-control" id="nm_mapel" style="width:100%" placeholder="Masukan Nama Matapelajaran">
              </input>
            </div>
          </div>    
          <div id="baris_text" class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="note_mapel" class="form-label">Catatan Matapelajaran</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <textarea class="form-control" id="note_mapel" style=" width:100%;max-height: 200px; overflow:scroll; height:150px"></textarea>
            </div>
          </div>
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
            <div class="modal-footer">
              <button id="clear" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button id="simpan_mapel" type="button" class="btn btn-primary">Simpan</button>
            </div>
      </div>
    </div>
  </div>
</div>
