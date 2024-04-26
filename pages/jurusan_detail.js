$(document).ready(function(){

    $("#ajaran").select2({
        placeholder: "Pilih Tahun ajaran",
        ajax: {
            url: base_url+'api/jurusan/select_ajaran',
            dataType: 'json',
            processResults: function (data) {
                return { results: data.results };
              }
          }
    });

    var id_jurusan = $("#id").val();
    $.ajax({
        url     : base_url+"api/jurusan/detail_data",
        method  : "post",
        data    : {id_jurusan: id_jurusan},
        dataType: "json", //Java Script Object Notation
        error : function(){
            swal("Sistem Bermasalah", {icon: "error"});
        },
        success: function(res){
            //console.log(res)

            $("#jurusan").val(res.nm_jurusan);
            $("#ajaran").val(res.id_ajaran).trigger("change");           
        }       
    });
});

$("#save").click(function(){
    var id_jurusan  = $("#id").val();
    var jurusan     = $("#jurusan").val();
    var ajaran      = $("#ajaran").val();

    //Pengecekan Isi dari jurusan
    if(jurusan.length < 1){
        swal("Jurusan wajib diisi", {icon: "error"});
    } 

    //Pengecekan muatan mapel
    if(ajaran.length < 1)
       $("#ajaran").addClass("is-invalid");
    else
      $("#ajaran").removeClass("is-invalid")

    
      if(jurusan.length > 0 && ajaran.length > 0){
        $.ajax({
            url     : base_url+"api/jurusan/ubah_data",
            method  : "post",
            data    : { id_jurusan:id_jurusan, nm_jurusan: jurusan, id_ajaran: ajaran},
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
      }   
   });     

