
$(document).ready(function(){

    $("#tabel_guru").DataTable({
        fixedHeader :true,
        language: {
            "zeroRecords": "Data Guru tidak ditemukan",
        },
        responsive:true,
        ajax : base_url+'api/guru/data_guru'
    });

  });

  

  $("#simpan_guru").click(function(){
    var email          = $("#email").val();
    var telp           = $("#telp").val();
    var guru           = $("#guru").val();
    var publikasi      = $("#publikasi").val();
    var password       = $("#password").val();    
    var konten;
    
    if(email.length < 1){
        swal("Email wajib diisi", {icon: "error"});
    } 
    //Pengecekan muatan mapel
    if(telp.length < 1)
       $("#telp").addClass("is-invalid");
    else
      $("#telp").removeClass("is-invalid");

    //Pengecekan muatan mapel
    if(guru.length < 1)
    $("#guru").addClass("is-invalid");
    else
    $("#guru").removeClass("is-invalid");

  if(email.length > 0 && telp.length > 0){
    $.ajax({
        url     : base_url+"api/guru/tambah_data",
        method  : "post",
        data    : { password: password, email_guru: email, hp_guru: telp, nm_guru: guru, status_guru: publikasi},
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
                $("#email").val("");
                $("#publikasi").val("Y").trigger("change");
                $("#telp").val(null).trigger("change");
                $("#guru").val("");

                $("#tabel_guru").DataTable().destroy();
                $("#tabel_guru").DataTable({
                    fixedHeader :true,
                    language: {
                        "zeroRecords" : "Guru tidak ditemukan",
                    },
                    responsive :true,
                    ajax : base_url+'api/guru/data_guru'  
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
                url     : base_url+"api/guru/hapus_data",
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
        
                        $("#tabel_guru").DataTable().destroy();
                        $("#tabel_guru").DataTable({
                            fixedHeader :true,
                            language: {
                                "zeroRecords" : "Guru tidak ditemukan",
                            },
                            responsive :true,
                            ajax : base_url+'api/guru/data_guru'  
                        });
                    });
                    // console.log(res);
                }
            });
        } 
      });
 }

 function detail(id){
        location.replace(base_url+"?p=guru_detail&id="+id);
 }

 function edit(id){
        location.replace(base_url+"?p=guru_edit&id="+id);
 }