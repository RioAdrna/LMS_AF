$("#btn_login").click(function(){
    var email_guru    = $("#email_guru").val();
    var password_guru = $("#password_guru").val();    

    $.ajax({
        url: base_url + "cas/log/login",
        type: "post",
        dataType: "json",
        data: {
            username: email_guru,
            password: password_guru
        },
        beforeSend: function() {
            Swal.fire({
                position: 'center',
                icon: 'info',
                iconHtml: '<i class="fas fa-spinner fa-pulse"></i>',
                title: 'Permintaan Diproses', 
                html: 'Tunggu Sesaat....',
                showConfirmButton: false,
                allowOutsideClick: false
            });
        },
        success: function(res) {
            if (res.status == "0") {
                Swal.fire(
                    res.message,
                    'Harap Periksa Kembali !!!',
                    'warning'
                );
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Sukses Login',
                    showConfirmButton: false,
                    timer: 1500
                });
                location.reload();
            }
        }
    });    
});
