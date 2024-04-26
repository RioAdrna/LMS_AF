$(document).ready(function(){
    $("#rombel, #ajaran").select2({
        placeholder: "Pilih Disini", 
        // ajax: {
        //     url: base_url+'api/tugas/select_rombel',
        //     dataType: 'json',
        //     processResults: function (data) {
        //         return { results: data.results };
        //       }
        //   }    
    });

    
    var id_kelas = $("#id").val();
    $.ajax({
        url     : base_url+"api/rombel/detail_data",
        method  : "post",
        data    : {id_kelas: id_kelas},
        dataType: "json", //Java Script Object Notation
        error : function(){
            swal("Sistem Bermasalah", {icon: "error"});
        },
        success: function(res){
            // console.log(res);

            $("#rombel").val(res.id_jurusan).trigger("change");
            $("#ajaran").val(res.id_ajaran).trigger("change");
            $("#kelas").val(res.nm_kelas);
        }
     });
  });

  $("#save").click(function(){
    var id_kelas       =$("#id").val();
    var rombel         = $("#rombel").val();
    var ajaran         = $("#ajaran").val();
    var kelas          = $("#kelas").val();
    var publikasi      = $("#publikasi").val();    
    var konten;
    
    //Pengecekan Isi dari matapelajaran
    if(rombel.length < 1){
        swal("Jurusan wajib diisi", {icon: "error"});
    } 
    //Pengecekan muatan mapel
    if(kelas.length < 1)
       $("#kelas").addClass("is-invalid");
    else
      $("#kelas").removeClass("is-invalid");

    //Pengecekan muatan mapel
    if(ajaran.length < 1)
    $("#ajaran").addClass("is-invalid");
    else
    $("#ajaran").removeClass("is-invalid");

  if(rombel.length > 0 && kelas.length > 0){
    $.ajax({
        url     : base_url+"api/rombel/ubah_data",
        method  : "post",
        data    : { id_kelas:id_kelas, id_jurusan: rombel, id_ajaran: ajaran, nm_kelas: kelas, status: publikasi},
        dataType: "json", //Java Script Object Notation
        error : function(){
            swal("Sistem Bermasalah", {icon: "error"});
        },
        success: function(res){
            swal(res.message, {icon:res.status}).then(function(){
                // location.reload();
            });
            // console.log(res);
        }
    });
    // console.log("Matapelajaran: "+mapel+", Judul:"+judul+", Konten:"+konten+", Link:"+pjj+", publikasi?"+publikasi);
  }

});