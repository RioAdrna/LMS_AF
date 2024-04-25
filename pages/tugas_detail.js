$(document).ready(function(){

    $("#mapel").select2({
        placeholder: "Pilih Matapelajaran",
        // ajax: {
        //     url: base_url+'api/materi/select_mapel',
        //     dataType: 'json',
        //     processResults: function (data) {
        //         return { results: data.results };
        //       }
        //   }
    });

    ClassicEditor
        .create( document.querySelector( '#isi_tugas' ) )
        .then( newEditor => {
            editor = newEditor;
        } )
        .catch( error => {
            console.error( error );
        } );

    var id_tugas = $("#id").val();
    $.ajax({
        url     : base_url+"api/tugas/detail_data",
        method  : "post",
        data    : {id_tugas: id_tugas},
        dataType: "json", //Java Script Object Notation
        error : function(){
            swal("Sistem Bermasalah", {icon: "error"});
        },
        success: function(res){
            // console.log(res);
            // swal(res.id_mapel);
            $("#mapel").val(res.id_mapel);
            $("#mapel").trigger("change");
            $("#judul").val(res.judul_tugas);
            $("#pjj").val(res.link_pjj);
            $("#publikasi").val(res.status_tugas).trigger("change");
            $("#views").html(res.views_materi);

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
                allowImagePreview: true,
                allowMultiple: false,
                allowFileEncode: false,
                required: false,
                maxFileSize: '3MB',
                instantUpload: true,
                labelIdle: `
                            <div style="width:100%;height:100%;">
                                <p>
                                Seret &amp; Simpan file diarea ini atau <span class="filepond--label-action" tabindex="0">Klik disini</span><br>
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
                            request.open('POST', base_url+'api/materi/upload_file?file='+res.file_tugas);
        
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
                                    swal({
                                        title: "Apakah anda yakin akan Menggunakan file tersebut?",
                                        text: "Anda akan menggunakan file yang anda unggah sebagai file pada materi jenis file ini!",
                                        icon: "warning",
                                        buttons: ["Batal & Kembali","Setuju & lanjutkan"],
                                        dangerMode: true,
                                    })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            swal("File Berhasil di unggah", {icon: "success"}).then(function(){
                                                $("#nm_file").val(nm_file);
                                            });
                                        } else {
                                            $.ajax({
                                                url: base_url+"api/materi/hapus_file",
                                                type: 'post',
                                                data: {nm_file: nm_file},
                                                success: function(){
                                                    swal("Anda telah menghapus file dan membatalkan perintah", {icon:"info"});
                                                }
                                            });
                                        }
                                    });
                                    else
                                    swal("File Gagal di upload, silahkan ulangi kembali", {icon:"error"}).then(function(){
                                    location.reload();
                                    });
                                } else {
                                    // Can call the error method if something is wrong, should exit after
                                    swal('Gagal', '');
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

            if(res.file_tugas.length > 0){
                $("#tugas_file").attr('checked', 'checked');
                $("#tugas_text").removeAttr('checked');
                $("#baris_text").hide();
                $("#baris_upload").show();
                $("#nm_file").val(res.file_tugas);
                $("#download_file").attr("href", base_url+"assets/files/tugas/"+res.file_tugas);
            }
            else{
                $("#tugas_text").attr('checked', 'checked');
                $("#tugas_file").removeAttr('checked');
                $("#baris_text").show();
                $("#baris_upload").hide();
                $("#nm_file").val("");
                editor.setData(res.konten_materi);
            }
        }
     });
  });

  $("#save").click(function(){
    var id_tugas     = $("#id").val(); //beda
    var mapel         = $("#mapel").val();
    var judul         = $("#judul").val();
    var tugas_text   = editor.getData();
    var tugas_file   = $("#nm_file").val();
    var pjj           = $("#pjj").val();
    var publikasi     = $("#publikasi").val();    
    var konten, jenis;
    
    //Pengecekan Isi dari matapelajaran
    if(mapel.length < 1){
        swal("Matapelajaran wajib diisi", {icon: "error"});
    } 

    //Pengecekan Judul Materi
    if(judul.length < 1)
      $("#judul").addClass("is-invalid");
    else
      $("#judul").removeClass("is-invalid");

      if($("#tugas_file").is(":checked") && tugas_file.length > 0){
        konten = tugas_file;
        jenis  = "file";
        } else if($("#tugas_file").is(":checked") && tugas_file.length < 1){
            swal("File Belum di upload", {icon: "warning"});
        } else {
            konten = tugas_text;
            jenis  = "text";
        }

    if(mapel.length > 0 && judul.length > 0){
      $.ajax({
          url     : base_url+"api/tugas/ubah_data", //beda
          method  : "post",
          data    : {id_tugas:id_tugas, id_mapel: mapel, judul_tugas: judul, konten:konten, link_pjj: pjj, status: publikasi},
          dataType: "json", //Java Script Object Notation
          error : function(){
              swal("Sistem Bermasalah", {icon: "error"});
          },
          success: function(res){
              swal(res.message, {icon:res.status}).then(function(){
                  // location.reload(); //beda
              });
              // console.log(res);
          }
      });
      // console.log("Matapelajaran: "+mapel+", Judul:"+judul+", Konten:"+konten+", Link:"+pjj+", publikasi?"+publikasi);
    }
  });