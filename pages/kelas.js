$(function(){
    $("#rombel").select2({
        allowClear: true,
        placeholder: "Pilih Kelas",
        dropdownParent: $('#exampleModal'), 
        ajax: {
            url: base_url+'api/rombel/select_rombel',
            dataType: 'json',
            procesResults: function (data) {
                return {results: data.results};
            }
        }
    });
    $("#ajaran").select2({
        allowClear: true,
        placeholder: "Pilih Ajaran",
        dropdownParent: $('#exampleModal'), 
        ajax: {
            url: base_url+'api/rombel/select_ajaran',
            dataType: 'json',
            procesResults: function (data) {
                return {results: data.results};
            }
        }
    });
    $("#tabel_rombel").DataTable({
        fixedHeader :false,
        language: {
            "zeroRecords": "Rombel tidak ditemukan",
        },
        // columnDefs: [
        //     { "width": "5%", "targets": 0 },
        //     { "width": "30%", "targets": 1 },
        //     { "width": "55%", "targets": 2 },
        //     { "width": "10%", "targets": 3 }
        //   ],
        responsive:true,
        ajax : base_url+'api/rombel/data_rombel'
    });


  });

  $("#clear").click(function(){
        $("#rombel").val(null).trigger("change");
  });
  $("#simpan").click(function(){
    var rombel         = $("#rombel").val();
    var ajaran       = $("#ajaran").val();
    var kelas       = $("#kelas").val();
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
        url     : base_url+"api/rombel/tambah_data",
        method  : "post",
        data    : { id_jurusan: rombel, id_ajaran: ajaran, nm_kelas: kelas, status: publikasi},
        dataType: "json", //Java Script Object Notation
        error : function(){
            swal("Sistem Bermasalah", {icon: "error"});
        },
        success: function(res){
            swal(res.message, {icon:res.status}).then(function(){
                // location.reload();
                $("#exampleModal").modal("hide");
                $("#rombel").val("");
                // $("#publikasi").val("Y").trigger("change");
                $("#kelas").val(null).trigger("change");
                $("#ajaran").val("");

                $("#tabel_rombel").DataTable().destroy();
                $("#tabel_rombel").DataTable({
                    fixedHeader :true,
                    language: {
                        "zeroRecords" : "Data Pelajar tidak ditemukan",
                    },
                    responsive :true,
                    ajax : base_url+'api/rombel/data_rombel'  
                });
            });
            // console.log(res);
        }
    });
    // console.log("Matapelajaran: "+mapel+", Judul:"+judul+", Konten:"+konten+", Link:"+pjj+", publikasi?"+publikasi);
  }

});

function hapus(id){
    swal({
        title: "Apakah anda yakin?",
        text: "Data yang anda hapus tidak dapat dikembalikan!!",
        icon: "warning",
        buttons: ["Batalkan","Hapus sekarang"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url     : base_url+"api/rombel/hapus_data",
                method  : "post",
                data    : { id: id},
                dataType: "json", //Java Script Object Notation
                error : function(){
                    swal("Sistem Bermasalah", {icon: "error"});
                },
                success: function(res){
                    swal(res.message, {icon:res.status}).then(function(){
        
                        $("#tabel_rombel").DataTable().destroy();
                        $("#tabel_rombel").DataTable({
                            fixedHeader :true,
                            language: {
                                "zeroRecords" : "Rombel tidak ditemukan",
                            },
                            responsive :true,
                            ajax : base_url+'api/rombel/data_rombel'  
                        });
                    });
                    // console.log(res);
                }
            });
        } else {
          swal("Anda membatalkan perintah hapus data!");
        }
      });
 }

 function detail(id){
       location.replace(base_url+"?p=kelas_detail&id="+id);
       
 }