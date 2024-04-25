    <br>
    <div class="content">
       <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12"> 
               <div class="card"> 
                    <div class="card-header border-2">
                        <div class="d-flex justify-content-between">
                        <div class="col-10">
                        <h6><i class="fas fa-book-open"></i> Materi <i class="fas fa-exclamation"></i></h6>
                </div>
                <div class="col-2 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="sdropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Materi</a></li>
                      <li><a class="dropdown-item border-radius-md" href="<?= base_url('?p=tugas_arsip')?>">Arsip Materi</a></li>
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
                        <table id="materi" class="table table-stripped" style="width:100%">
                            
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
 
