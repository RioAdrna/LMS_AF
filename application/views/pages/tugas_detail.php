<br>
    <div class="content">
       <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12"> 
               <div class="card"> 
                    <div class="card-header border-2">
                        <div class="d-flex justify-content-between">
                        <div class="col-10">
                        <h6><i class="fas fa-info-circle"></i>  Detail Tugas</h6>
                </div>
                <button onclick="location.replace('<?= base_url('?p=tugas') ?>')" class="btn btn-danger float"><i class="fa fa-arrow-circle-left"></i> Kembali</button>

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
          <label for="mapel" class="form-label">Mata Pelajaran</label>
</div>
<div class="col-md-8 col-xs-6">

  
<select class="form-control" id="mapel" style="width:100%" disabled>
    <option></option>
    <?php
    $data = $this->mtugas->select_tugas($this->input->get("q"))->result();
    foreach($data as $data):
        echo "<option value='$data->id_mapel'>$data->nm_mapel</option>";
    endforeach;
    ?>
</select>

</div>
</div>

<div class="row mb-3">
          <div class="col-md-4 col-xs-6">
          <label for="judul" class="form-label">Judul Tugas</label>
</div>

<div class="col-md-8 col-xs-6">

  
  <input type="email" class="form-control" id="judul" placeholder="masukan judul tugas" readonly>
</div>
</div>

<div class="row mb-3">
  <div class="col-md-4 col-xs-12">
  <label class="form-label">Jenis Tugas</label>
</div>
  <div class="col-md-8 col-xs-12">
    
  <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="tugas_text" checked disabled>
  <label class="form-check-label" for="tugas_text">
   Tugas Tertulis
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="tugas_file" disabled>
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
                            <a id="download_file" class="m-4 btn btn-success" download><i class="fa fa-download"></i> Unduh File</a>
            </div>
          </div>

<div class="row mb-3">
            <div class="col-md-4 col-xs-6">
              <label for="publikasi" class="form-label">Publikasi</label>
            </div>
            <div class="col-md-8 col-xs-6">
              <select class="form-control" id="publikasi" >
                <option value="Y">Publish</option>
                <option value="N">Draft</option>
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