$(function(){
    $("#tabel_ajaran").DataTable({
        fixedHeader :true,
        language: {
            "zeroRecords" : "Data Ajaran tidak ditemukan",
        },
        // columnDefs: [
        //     { "width": "5%", "targets": 0 },
        //     { "width": "30%", "targets": 1 },
        //     { "width": "55%", "targets": 2 },
        //     { "width": "10%", "targets": 3 }
        //   ],
        responsive :true,
        ajax : base_url+'api/ajaran/data_ajaran'  
    });

    $("#clear").click(function(){
        
     });

     $("#simpan_ajaran").click(function(){
        var kurikulum     = $("#kurikulum").val();
        var ajaran1      = $("#ajaran1").val();
        var ajaran2      = $("#ajaran2").val();

        //Pengecekan Isi dari jurusan
        if(kurikulum.length < 1){
            Swal.fire({title : "Kurikulum wajib diisi", icon: "error"});                       
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
                url     : base_url+"api/ajaran/tambah_data",
                method  : "post",
                data    : { nm_kurikulum: kurikulum, tahun_ajaran1: ajaran1, tahun_ajaran2: ajaran2 },
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
                        $("#kurikulum").val("");
                        $("#ajaran1").val("");
                        $("#ajaran2").val("");
        
                        $("#tabel_ajaran").DataTable().destroy();
                        $("#tabel_ajaran").DataTable({
                            fixedHeader :true,
                            language: {
                                "zeroRecords" : "Data Ajaran tidak ditemukan",
                            },
                            responsive :true,
                            ajax : base_url+'api/ajaran/data_ajaran'  
                        });
                    });
                    // console.log(res);
                 }
             });   
          }   
       }); 
})

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
            // perintah asincronous JS & XML (AJAX)
            $.ajax({
                url     : base_url+"api/ajaran/hapus_data",
                method  : "post",
                data    : {id: id},
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
        
                        $("#tabel_ajaran").DataTable().destroy();
                        $("#tabel_ajaran").DataTable({
                            fixedHeader :true,
                            language: {
                                "zeroRecords" : "Data Ajaran tidak ditemukan",
                            },
                            responsive :true,
                            ajax : base_url+'api/ajaran/data_ajaran'  
                        });
                    });
                    // console.log(res);
                }
            });
    
        }   
      });
    }

    function detail(id){
        location.replace(base_url+"?p=ajaran_detail&id="+id);
  }

    