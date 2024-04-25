<br>
    <div class="content">
       <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12"> 
               <div class="card"> 
                    <div class="card-header border-2">
                        <div class="d-flex justify-content-between">
                        <div class="col-10">
                        <h6><i class="fas fa-book-open"></i> Tugas <i class="fas fa-exclamation"></i></h6>
                </div>
                <div class="col-2 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="sdropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Tugas</a></li>
                      <li><a class="dropdown-item border-radius-md" href="">Arsip Tugas</a></li>
                    </ul>
                  </div>
                </div>
                         <!-- Button trigger modal -->
                         <br>
                        <!-- <button id="tambah_data" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus-square"></i> &nbsp;Tambah Data
                        </button> -->
                        </div>
                    </div>
                        <div class="card-body">
                        <table id="tugas" class="table table-bordered" style="width:100%">
                            
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>MataPelajaran</th>
                                        <th>Judul Materi</th>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Tambah Tugas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="row mb-3">
          <div class="col-md-4 col-xs-6">
          <label for="mapel" class="form-label">Mata Pelajaran</label>
          </div>
      <div class="col-md-8 col-xs-6">
        <select class="form-control" id="mapel" style="width:100%">
        <option></option>
        </select>
      </div>
      </div>

      <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="kelas" class="form-label">Pilih Kelas</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <select class="form-control" id="kelas" style="width:100%" multiple="multiple">
                <option></option>
              </select>
            </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-4 col-xs-6">
          <label for="judul" class="form-label">Judul Tugas</label>
          </div>
          <div class="col-md-8 col-xs-6">
            <input type="email" class="form-control" id="judul" placeholder="masukan judul tugas">
          </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4 col-xs-12">
            <label class="form-label">Jenis Tugas</label>
          </div>
            <div class="col-md-8 col-xs-12">
              
            <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="tugas_text" checked>
            <label class="form-check-label" for="tugas_text">
            Tugas Tertulis
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="tugas_file">
            <label class="form-check-label" for="tugas_file">
            Tugas File
            </label>
          </div>
          <br>
          </div>

          <div id="baris_text" class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="isi_tugas" class="form-label">Isi Tugas Tertulis</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <textarea class="form-control" id="isi_tugas" style=" width:100%;max-height: 200px; overflow:scroll; height:150px"></textarea>
            </div>
          </div>
          <div id="baris_upload" class="row mb-3" style="display:none">
            <div class="col-md-4 col-xs-6">
              <label for="file_tugas" class="form-label">File Tugas</label>
            </div>
            <div class="col-md-8 col-xs-6">
            <input type="file" class="form-control" id="file_tugas" name="file_tugas">
              <input type="hidden" id="nm_file">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="publikasi" class="form-label">Status</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <select class="form-control" id="publikasi" >
                <option value="Y">Publish</option>
                <option value="N">Draft</option>
              </select>
                </div>
              </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
      </div>
    </div>
  </div>
</div>


 

