$(function(){
    // $("#mapel").select2({
    //     placeholder: "Pilih mata pelajaran",
    //     dropdownParent: $('#exampleModal'),
    //     ajax: {
    //         url: base_url+'api/mapel/select_mapel',
    //         dataType: 'json',
    //         processResult: function (data) {
    //             return {results: data.results};
    //         }
    //       }       
    // });
    $("#mapel").DataTable({
        fixedHeader :true,
        language: {
            "zeroRecords": "MataPelajaran tidak ditemukan",
        },
        responsive:true,
        ajax : base_url+'api/mapel/data_mapel_arsip'
    });

    ClassicEditor
    .create( document.querySelector( '#note_mapel' ) )
    .then( newEditor => {
        editor = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );

  });

  $("#clear").click(function(){
        $("#mapel").val(null).trigger("change");
  });
  
  $("#simpan_mapel").click(function(){
    var muatan        = $("#muatan").val();
    var nm_mapel         = $("#nm_mapel").val();
    var note_mapel     = editor.getData();
    var publikasi     = $("#publikasi").val();    
   
 
    // //Pengecekan Isi dari matapelajaran
     if(nm_mapel.length < 1){
         swal("Matapelajaran wajib diisi", {icon: "error"});
      } 

    //Pengecekan muatan mapel
    if(muatan.length < 1)
       $("#muatan").addClass("is-invalid");
    else
      $("#muatan").removeClass("is-invalid");

      
    if(nm_mapel.length > 0 && muatan.length > 0){
    $.ajax({
        url     : base_url+"api/mapel/tambah_data",
        method  : "post",
        data    : {muatan: muatan,nm_mapel: nm_mapel, note_mapel: note_mapel, status_mapel: publikasi},
        dataType: "json", //Java Script Object Notation
        error : function(){
            swal("Sistem Bermasalah", {icon: "error"});
        },
        success: function(res){
            swal(res.message, {icon:res.status}).then(function(){
                // location.reload();
                $("#exampleModal").modal("hide");
                $("#muatan").val("");
                $("#publikasi").val("Y").trigger("change");
                $("#nm_mapel").val(null).trigger("change");
                editor.setData("");

                $("#mapel").DataTable().destroy();
                $("#mapel").DataTable({
                    fixedHeader :true,
                    language: {
                        "zeroRecords" : "Mata Pelajaran tidak ditemukan",
                    },
                    responsive :true,
                    ajax : base_url+'api/mapel/data_mapel'  
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
        text: "Data  yang dihapus tidak dapat dikembalikan",
        icon: "warning",
        buttons: ["Batalkan","Hapus sekarang"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            // perintah asincronous JS & XML (AJAX)
            $.ajax({
                url     : base_url+"api/mapel/hapus_data",
                method  : "post",
                data    : {id: id},
                dataType: "json", //Java Script Object Notation
                error : function(){
                    swal("Sistem Bermasalah", {icon: "error"});
                },
                success: function(res){
                    swal(res.message, {icon:res.status}).then(function(){  
        
                        $("#mapel").DataTable().destroy();
                        $("#mapel").DataTable({
                            fixedHeader :true,
                            language: {
                                "zeroRecords" : "Mata Pelajaran tidak ditemukan",
                            },
                            responsive :true,
                            ajax : base_url+'api/mapel/data_mapel'  
                        });
                    });
                    // console.log(res);
                }
            });
    
        } 
      });
    }      
function detail(id){
        location.replace(base_url+"?p=mapel_detail&id="+id); 
}