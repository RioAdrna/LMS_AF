var proses;
$(document).ready(function () {
    var id_guru = $("#id").val();
    $.ajax({
      url     : base_url+"api/guru/detail_personal",
      method: "POST",
      dataType: "json",
      data: { id_guru: id_guru },
      error: function () {
        Swal.fire({
          position: "center",
          icon: "success",
          title: "Gagal Mengambil Data",
          showConfirmButton: false,
          timer: 1500,
        });
      },

      success: function (response) {
        if (response.jenis_kelamin == "L") {
          var jenis_kelamin = "Laki-Laki";
        } else {
          var jenis_kelamin = "Perempuan";
        }

        $("#id_hd").val(response.id_guru);
        $("#id_guru").html(response.id_guru);
        if (response.id_guru === null || response.id_guru === "") {
          $("#img_logo").attr("src", base_url + "assets/img/avatars/no-image.png");
        } else {
          var imgSrc = base_url + "assets/files/profile/" + response.id_guru + ".jpg";
          $("#img_logo").attr("src", imgSrc).on("error", function() {
              // console.error("Error loading image:", imgSrc);
              $(this).attr("src", base_url + "assets/img/avatars/no-image.png");
          });
        }
      //   $("#img_logo").attr(
      //     "src",
      //     base_url + "/assets/files/profile/" + response.id_guru + ".jpg"
      // );
      
      
        $("#nama_personal").html(response.nm_guru);  
        $("#nip").html(response.nip_guru);  
        $("#nik").html(response.nik_guru);  
        $("#alamat").html(response.alamat_guru);  
        $("#telp_hp").html(response.hp_guru);  
        $("#email").html(response.email_guru);  
        $("#gender").html(jenis_kelamin);  
        $("#tgl_lahir").html(response.tgl_lahir);
        $("#tmpt_lahir").html(response.tmt_lahir+', ');
        $('#agama').html(response.agama);
      },

    });
});