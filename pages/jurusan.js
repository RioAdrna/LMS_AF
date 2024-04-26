$(function(){

    $("#ajaran").select2({
        // theme: "classic",
        allowClear: true,
        placeholder: "Pilih Tahun ajaran",
        dropdownParent: $('#exampleModal'), 
        ajax: {
            url: base_url+'api/jurusan/select_ajaran',
            dataType: 'json',
            procesResults: function (data) {
                return {results: data.results};
            }
        }
    
    });

    $("#tabel_jurusan").DataTable({
        fixedHeader :true,
        language: {
            "zeroRecords" : "Data Jurusan tidak ditemukan",
        },
        // columnDefs: [
        //     { "width": "5%", "targets": 0 },
        //     { "width": "30%", "targets": 1 },
        //     { "width": "55%", "targets": 2 },
        //     { "width": "10%", "targets": 3 }
        //   ],
        responsive :true,
        ajax : base_url+'api/jurusan/data_jurusan'  
    });

    $("#clear").click(function(){
        $("#ajaran").val(null).trigger("change");   
     });

    $("#simpan_jurusan").click(function(){
        var jurusan     = $("#jurusan").val();
        var ajaran      = $("#ajaran").val();

        //Pengecekan Isi dari jurusan
        if(ajaran.length < 1){
            swal("Ajaran wajib diisi", {icon: "error"});
        } 
    
        //Pengecekan muatan mapel
        if(jurusan.length < 1)
           $("#jurusan").addClass("is-invalid");
        else
          $("#jurusan").removeClass("is-invalid");
    
        
          if(jurusan.length > 0 && ajaran.length > 0){
            $.ajax({
                url     : base_url+"api/jurusan/tambah_data",
                method  : "post",
                data    : { nm_jurusan: jurusan, id_ajaran: ajaran},
                dataType: "json", //Java Script Object Notation
                error : function(){
                    swal("Sistem Bermasalah", {icon: "error"});
                },
                success: function(res){
                    swal(res.message, {icon:res.status}).then(function(){
                        // location.reload();
                        $("#exampleModal").modal("hide");
                        $("#jurusan").val("");
                        $("#ajaran").val(null).trigger("change");
        
                        $("#tabel_jurusan").DataTable().destroy();
                        $("#tabel_jurusan").DataTable({
                            fixedHeader :true,
                            language: {
                                "zeroRecords" : "Data Jurusan tidak ditemukan",
                            },
                            responsive :true,
                            ajax : base_url+'api/jurusan/data_jurusan'  
                        });
                    });
                    // console.log(res);
                 }
             });   
          }   
       });     
})

function hapus(id){
    swal({
        title: "Apakah anda yakin?",
        text: "Data  yang dihapus tidak dapat dikembalikan",
        icon: "warning",
        buttons: ["Batalkan","Hapus sekarang"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            // perintah asincronous JS & XML (AJAX)
            $.ajax({
                url     : base_url+"api/jurusan/hapus_data",
                method  : "post",
                data    : {id: id},
                dataType: "json", //Java Script Object Notation
                error : function(){
                    swal("Sistem Bermasalah", {icon: "error"});
                },
                success: function(res){
                    swal(res.message, {icon:res.status}).then(function(){  
        
                        $("#tabel_jurusan").DataTable().destroy();
                        $("#tabel_jurusan").DataTable({
                            fixedHeader :true,
                            language: {
                                "zeroRecords" : "Mata Pelajaran tidak ditemukan",
                            },
                            responsive :true,
                            ajax : base_url+'api/jurusan/data_jurusan'  
                        });
                    });
                    // console.log(res);
                }
            });
    
        } else {
          swal("Anda membatalkan");
        }
      });
    }

    function detail(id){
        location.replace(base_url+"?p=jurusan_detail&id="+id);
  }