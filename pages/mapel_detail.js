$(document).ready(function(){

    ClassicEditor
    .create( document.querySelector( '#note_mapel' ) )
    .then( newEditor => {
        editor = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );

    var id_mapel = $("#id").val();
    $.ajax({
        url     : base_url+"api/mapel/detail_data",
        method  : "post",
        data    : {id_mapel: id_mapel},
        dataType: "json", //Java Script Object Notation
        error : function(){
            swal("Sistem Bermasalah", {icon: "error"});
        },
        success: function(res){
            //console.log(res)

            $("#muatan").val(res.muatan);
            $("#nm_mapel").val(res.nm_mapel);
            $("#publikasi").val(res.status_mapel).trigger("change");
            editor.setData(res.note_mapel);
            
        }
        
    });
    $("#save").click(function(){
    var id_mapel       = $("#id").val();
    var muatan         = $("#muatan").val();
    var nm_mapel       = $("#nm_mapel").val();
    var note_mapel     = editor.getData();
    var publikasi      = $("#publikasi").val();    
    var konten;
    
    //Pengecekan Isi dari matapelajaran
    if(nm_mapel.length < 1){
        swal("Matapelajaran wajib diisi", {icon: "error"});
    } 
    //Pengecekan muatan mapel
    if(muatan.length < 1)
       $("#muatan").addClass("is-invalid");
    else
      $("#muatan").removeClass("is-invalid");



    //Pengecekan pilihan konten file/text
    if($("#note_mapel").is(':checked'))
    konten = note_mapel;

  if(nm_mapel.length > 0 && muatan.length > 0){
    $.ajax({
        url     : base_url+"api/mapel/ubah_data",
        method  : "post",
        data    : { id_mapel:id_mapel, muatan: muatan, nm_mapel: nm_mapel, note_mapel: note_mapel, status_mapel: publikasi},
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

});