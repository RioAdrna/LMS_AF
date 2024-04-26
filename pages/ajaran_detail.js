$(document).ready(function(){

    var id_ajaran = $("#id").val();
    $.ajax({
        url     : base_url+"api/ajaran/detail_data",
        method  : "post",
        data    : {id_ajaran: id_ajaran},
        dataType: "json", //Java Script Object Notation
        error : function(){
            swal("Sistem Bermasalah", {icon: "error"});
        },
        success: function(res){
            //console.log(res)

            $("#kurikulum").val(res.nm_kurikulum);
            $("#ajaran1").val(res.tahun_ajaran1);
            $("#ajaran2").val(res.tahun_ajaran2);
                      
        }       
    });
});

$("#save").click(function(){
    var id_ajaran    = $("#id").val();
    var kurikulum     = $("#kurikulum").val();
    var ajaran1      = $("#ajaran1").val();
    var ajaran2      = $("#ajaran2").val();

    //Pengecekan Isi dari jurusan
    if(kurikulum.length < 1){
        swal("Kurikulum wajib diisi", {icon: "error"});
    } 

    //Pengecekan muatan mapel
    if(ajaran1.length < 1)
       $("#ajaran1").addClass("is-invalid");
    else
      $("#ajaran1").removeClass("is-invalid")

      //Pengecekan muatan mapel
    if(ajaran2.length < 1)
      $("#ajaran2").addClass("is-invalid");
    else
      $("#ajaran2").removeClass("is-invalid")
 
    
      if(kurikulum.length > 0 && ajaran1.length > 0){
        $.ajax({
            url     : base_url+"api/ajaran/ubah_data",
            method  : "post",
            data    : { id_ajaran: id_ajaran, nm_kurikulum: kurikulum, tahun_ajaran1: ajaran1, tahun_ajaran2: ajaran2 },
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