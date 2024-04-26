var proses;
$(document).ready(function() {
     //Aktifkan FilePOND 
     FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginImageExifOrientation,
        FilePondPluginFileValidateSize,
        FilePondPluginFileValidateType,
    );
    
    // Select the file input and use 
    // create() to turn it into a pond
    var pond = FilePond.create(document.querySelector('#file_tugas'), {
        allowImagePreview: false,
        allowMultiple: false,
        allowFileEncode: false,
        required: false,
        maxFileSize: '7MB',
        instantUpload: true,
        labelIdle: `
                    <div style="width:100%;height:100%;">
                  
                      <p>
                        Seret &amp; Simpan file diarea ini atau <span class="filepond--label-action" tabindex="0">Klik disini</span>
                       </p>
                    </div>
                `,
        acceptedFileTypes: ['application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'application/pdf',
        'image/gif', 'application/zip', 'image/jpeg', 'image/png', 'image/svg+xml'],
        fileValidateTypeDetectType: (source, type) =>
            new Promise((resolve, reject) => {
            console.log(source, type);
                // Do custom type detection here and return with promise
                // swal("Tipe File Tidak sesuai", {icon:"error"});
                resolve(type);
            }),
        // upload Ke Server
        server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    // fieldName is the name of the input field
                    // file is the actual file object to send
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);

                    const request = new XMLHttpRequest();
                    // request.open('POST', origin+'calon_anggota_p/upload_file?id_rec='+id_rec);
                    request.open('POST', base_url+'api/tugas/upload_file');

                    // Should call the progress method to update the progress to 100% before calling load
                    // Setting computable to false switches the loading indicator to infinite mode
                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };

                    // Should call the load method when done and pass the returned server file id
                    // this server file id is then used later on when reverting or restoring a file
                    // so your server knows which file to return without exposing that info to the client
                    request.onload = function () {
                        if (request.status >= 200 && request.status < 300) {
                            // the load method accepts either a string (id) or an object
                            var status = JSON.parse(request.responseText).sts;
                            var pesan  = JSON.parse(request.responseText).msg;
                            var nm_file  = JSON.parse(request.responseText).nm_file;

                            console.log("STATUS: "+status+", PESAN: "+pesan+" nama file: "+nm_file);
                            if(status == "1")
                            Swal.fire({
                                title: "Apakah anda yakin akan Menggunakan file tersebut?",
                                text: "Anda akan menggunakan file yang anda unggah sebagai file pdf!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: '#28A745',
                                cancelButtonColor: '#DC3545',
                                confirmButtonText: 'Ya, unggah!',
                                cancelButtonText: 'Tidak, batalkan',
                                dangerMode: true,
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    Swal.fire('File Berhasil di unggah', '', 'success').then(function(){
                                        $("#nm_file").val(nm_file);
                                        // location.reload();
                                    });
                                } else {
                                    $.ajax({
                                        url: base_url+"api/tugas/hapus_file",
                                        type: 'post',
                                        data: {nm_file: nm_file},
                                        success: function(){
                                            Swal.fire("Anda telah menghapus file dan membatalkan perintah", "", "info");
                                        }
                                    });
                                }
                            });
                            else
                            Swal.fire('File gagal di upload, silahkan ulangi kembali', '', 'info').then(function(){
                            // location.reload();
                            });
                        } else {
                            // Can call the error method if something is wrong, should exit after
                            Swal.fire('Gagal', '');
                        }
                    };

                    request.send(formData);

                    // Should expose an abort method so the request can be cancelled
                    return {
                        abort: () => {
                            // This function is entered if the user has tapped the cancel button
                            request.abort();

                            // Let FilePond know the request has been cancelled
                            abort();
                        },
                    };
                },
        },
    });
    //END Filepond

    $("#tugas").DataTable({
        fixedHeader :true,
        language: {
            "zeroRecords": "Tugas tidak ditemukan",
        },
        
        "autoWidth": false,
        responsive:true,
        ajax : base_url+'api/tugas/data_tugas'
    });
});

$("#mapel").select2({
    placeholder: "Pilih MataPelajaran",
    dropdownParent: $('#exampleModal'), 
    ajax: {
        url: base_url+'api/tugas/select_tugas',
        dataType: 'json',
        procesResults: function (data) {
            return {results: data.results};
        }
    }

});

$("#kelas").select2({
    placeholder: "Pilih Kelas",
    dropdownParent: $('#exampleModal'),
    ajax: {
        url: base_url+'api/tugas/select_kelas',
        dataType: 'json',
        processResults: function (data) {
            return { results: data.results };
          }
      }
});

ClassicEditor
    .create( document.querySelector( '#isi_tugas' ) )
    .then( newEditor => {
        editor = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );

    $("#clear").click(function(){
        $("#mapel").val(null).trigger("change");
       });
    
       $("#tugas_file").click(function(){
        $("#baris_upload").fadeIn();
        $("#baris_text").hide();
    });
    
    $("#tugas_text").click(function(){
        $("#baris_upload").hide();
        $("#baris_text").fadeIn();
    });
    
    $("#simpan").click(function(){
        var kelas         = $("#kelas").val();
        var mapel         = $("#mapel").val();
        var judul         = $("#judul").val();
        var tugas_text   = editor.getData();
        var tugas_file   = $("#nm_file").val();
        var publikasi     = $("#publikasi").val(); 
        var konten, jenis;
    
        if($("#tugas_file").is(":checked") && tugas_file.length > 0){
          konten = tugas_file;
          jenis  = "file";
      } else if($("#tugas_file").is(":checked") && tugas_file.length < 1){
        Swal.fire({title : "File Belum di upload", icon: "warning"});                       
      } else {
          konten = tugas_text;
          jenis  = "text";
        }
    
        
        //Pengecekan Isi dari matapelajaran
        if(mapel.length < 1){
            Swal.fire({title : "Matapelajaran wajib diisi", icon: "error"});                       
        } 
    
        //Pengecekan Judul Materi
        if(judul.length < 1)
        $("#judul").addClass("is-invalid");
      else
        $("#judul").removeClass("is-invalid");
    
        if(mapel.length > 0 && judul.length > 0){
            $.ajax({
                url     : base_url+"api/tugas/tambah_data",
                method  : "post",
                data    : {kelas:JSON.stringify(kelas), jenis: jenis , id_mapel: mapel, judul_tugas: judul, konten:konten, status: publikasi},
                dataType: "json", //Java Script Object Notation
                error : function(){
                    Swal.fire({title : "Sistem Bermasalah", icon: "error"});                       
                },
                success: function(res){
                    Swal.fire({
                        title: res.message,
                        icon: "success"
                      })              
                    .then(function(){           
                        // location.reload();
                        $("#exampleModal").modal("hide");
                        $("#judul").val("");
                        $("#publikasi").val("Y").trigger("change");
                        $("#mapel").val(null).trigger("change");
                        editor.setData("");
    
                        $("#tugas").DataTable().destroy();
                        $("#tugas").DataTable({
                            fixedHeader :true,
                            language: {
                                "zeroRecords" : "Tugas tidak ditemukan",
                            },
                            responsive :true,
                            ajax : base_url+'api/tugas/data_tugas'  
                        });
                    });
                    // console.log(res);
                }
            });
            // console.log("Matapelajaran: "+mapel+", Judul:"+judul+", Konten:"+konten+", Link:"+pjj+", publikasi?"+publikasi);
          }
    
          
      });

      function hapus(id){
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data yang anda hapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#28A745",
            cancelButtonColor: "#DC3545",
            confirmButtonText: "Ya, hapus sekarang!"
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url     : base_url+"api/tugas/hapus_data",
                    method  : "post",
                    data    : { id: id},
                    dataType: "json", //Java Script Object Notation
                    error : function(){
                        Swal.fire({title : "Sistem Bermasalah", icon: "error"});                       
                    },
                    success: function(res){
                           Swal.fire({
                                title: res.message,
                                icon: "success"
                            })              
                            .then(function(){ 
            
                            $("#tugas").DataTable().destroy();
                            $("#tugas").DataTable({
                                fixedHeader :true,
                                language: {
                                    "zeroRecords" : "Tugas tidak ditemukan",
                                },
                                responsive :true,
                                ajax : base_url+'api/tugas/data_tugas'  
                            });
                        });
                        // console.log(res);
                    }
                });
            }
          });
        }


        function detail(id){
            location.replace(base_url+"?p=tugas_detail&id="+id);
  }
