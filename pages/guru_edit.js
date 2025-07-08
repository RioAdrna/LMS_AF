var proses;
$(document).ready(function () {
    var id_guru = $("#id").val();
    $.ajax({
        url     : base_url+"api/guru/detail_data",
        method  : "post",
        data    : {id_guru: id_guru},
        dataType: "json", //Java Script Object Notation
        error : function(){
            Swal.fire({position: 'center',icon: 'success',title: 'Gagal Mengambil Data',showConfirmButton: false,timer: 1500});
        },
        success: function(res){
            //console.log(res)
            $("#id_hd").val(res.id_guru);
            if (res.id_guru === null || res.id_guru === "") {
                $("#img_logo").attr("src", base_url + "assets/img/avatars/no-image.png");
              } else {
                var imgSrc = base_url + "assets/files/profile/" + res.id_guru + ".jpg";
                $("#img_logo").attr("src", imgSrc).on("error", function() {
                    // console.error("Error loading image:", imgSrc);
                    $(this).attr("src", base_url + "assets/img/avatars/no-image.png");
                });
              }

            $("#id_guru").html(res.id_guru);
            $("#nm_guru").val(res.nm_guru);
            $("#nip_guru").val(res.nip_guru);
            $("#nik_guru").val(res.nik_guru);
            $("#tmt_lahir").val(res.tmt_lahir);
            $("#tgl_lahir").val(res.tgl_lahir);
            $("#alamat_guru").val(res.alamat_guru);
            $("#jenis_kelamin").val(res.jenis_kelamin);
            $("#hp_guru").val(res.hp_guru);
            $("#agama").val(res.agama);
            $("#email_guru").val(res.email_guru);
            // $("#password").val(res.password);
            $("#publikasi").val(res.status_guru);
                      
        }       
    });
     //Aktifkan FilePOND
  FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginImageExifOrientation,
    FilePondPluginFileValidateSize,
    FilePondPluginFileValidateType
  );

  // Select the file input and use
  // create() to turn it into a pond
  var pond = FilePond.create(document.querySelector("#jpeg"), {
    allowImagePreview: false,
    allowMultiple: false,
    allowFileEncode: false,
    required: false,
    maxFileSize: "3MB",
    instantUpload: true,
    labelIdle: `
    <div style="width:100%;height:100%;">
        <p>
            <br><i class="fas fa-camera"></i><br>
        </p>
    </div>
`,

    acceptedFileTypes: ["image/jpeg", "image/png"],
    fileValidateTypeDetectType: (source, type) =>
      new Promise((resolve, reject) => {
        console.log(source, type);
        // Do custom type detection here and return with promise
        // swal("Tipe File Tidak sesuai", {icon:"error"});
        resolve(type);
      }),
    // upload Ke Server
    server: {
      process: (
        fieldName,
        file,
        metadata,
        load,
        error,
        progress,
        abort,
        transfer,
        options
      ) => {
        // fieldName is the name of the input field
        // file is the actual file object to send
        const formData = new FormData();
        formData.append(fieldName, file, file.name);

        const request = new XMLHttpRequest();
        request.open(
          "POST",
          base_url + "api/guru/upload_file?id_guru=" + $("#id_hd").val()
        );

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
            var pesan = JSON.parse(request.responseText).msg;
            var nm_file = JSON.parse(request.responseText).nm_file;

            console.log(
              "STATUS: " +
                status +
                ", PESAN: " +
                pesan +
                " nama file: " +
                nm_file
            );
            if (status == "1")
              Swal.fire({
                title: "Apakah anda yakin akan Menggunakan foto tersebut?",
                text: "Anda akan menggunakan foto yang anda unggah sebagai foto profile!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28A745",
                cancelButtonColor: "#DC3545",
                confirmButtonText: "Ya, unggah!",
                cancelButtonText: "Tidak, batalkan",
                dangerMode: true,
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire("Foto Berhasil di unggah", "", "success").then(
                    function (event) {
                      // $("#nm_file").val(nm_file);
                      location.reload(true);
                      // var time = event.timeStamp()
                      // $("#img_logo").attr("src", base_url+"assets/files/profile/"+$("#id_hd").val()+".jpg?"+time)
                      // var time = event.timeStamp();
                      $("#img_logo").attr(
                        "src",
                        base_url +
                          "assets/files/profile/" +
                          $("#id_hd").val() +
                          ".jpg?" +
                          time
                      );
                    }
                  );
                } else {
                  $.ajax({
                    url: base_url + "api/guru/hapus_file",
                    type: "post",
                    data: { nm_file: nm_file },
                    success: function () {
                      Swal.fire(
                        "Anda telah menghapus foto dan membatalkan perintah",
                        "",
                        "info"
                      );
                    },
                  });
                }
              });
            else
              Swal.fire(
                "Foto gagal di upload, silahkan ulangi kembali",
                "",
                "info"
              ).then(function () {
                location.reload(true);
              });
          } else {
            // Can call the error method if something is wrong, should exit after
            Swal.fire("Gagal", "");
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
});

$("#save").click(function(){
    var id_guru      = $("#id").val();
    var nm_guru     = $("#nm_guru").val();
    var nip_guru      = $("#nip_guru").val();
    var nik_guru      = $("#nik_guru").val();
    var tmt_lahir      = $("#tmt_lahir").val();
    var tgl_lahir      = $("#tgl_lahir").val();
    var alamat_guru      = $("#alamat_guru").val();
    var hp_guru      = $("#hp_guru").val();
    var agama      = $("#agama").val();
    var email_guru      = $("#email_guru").val();
    var password      = $("#password").val();
    var jenis_kelamin      = $("#jenis_kelamin").val();
    var publikasi      = $("#publikasi").val();

    if(nm_guru.length < 1)
    $("#nm_guru").addClass("is-invalid");
 else
   $("#nm_guru").removeClass("is-invalid")


    if(nip_guru.length < 1)
       $("#nip_guru").addClass("is-invalid");
    else
      $("#nip_guru").removeClass("is-invalid")


    if(nik_guru.length < 1)
      $("#nik_guru").addClass("is-invalid");
    else
      $("#nik_guru").removeClass("is-invalid")


    if(tmt_lahir.length < 1)
      $("#tmt_lahir").addClass("is-invalid");
    else
      $("#tmt_lahir").removeClass("is-invalid")


    if(tgl_lahir.length < 1)
      $("#tgl_lahir").addClass("is-invalid");
    else
      $("#tgl_lahir").removeClass("is-invalid")


    if(alamat_guru.length < 1)
      $("#alamat_guru").addClass("is-invalid");
    else
      $("#alamat_guru").removeClass("is-invalid")


    if(agama.length < 1)
      $("#agama").addClass("is-invalid");
    else
      $("#agama").removeClass("is-invalid")


    if(email_guru.length < 1)
      $("#email_guru").addClass("is-invalid");
    else
      $("#email_guru").removeClass("is-invalid")


    if(hp_guru.length < 1)
      $("#hp_guru").addClass("is-invalid");
    else
      $("#hp_guru").removeClass("is-invalid")
 
    
      if(nm_guru.length > 0 && nip_guru.length > 0){
        $.ajax({
            url     : base_url+"api/guru/ubah_data",
            method  : "post",
            data    : { id_guru: id_guru, nm_guru: nm_guru, nip_guru: nip_guru, nik_guru: nik_guru,tmt_lahir: tmt_lahir,tgl_lahir:tgl_lahir,alamat_guru:alamat_guru,hp_guru:hp_guru,email_guru:email_guru,password:password,agama:agama ,status_guru:publikasi,jenis_kelamin:jenis_kelamin},
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
                });
                // console.log(res);
             }
         });   
      }   
   }); 