var proses;
$(document).ready(function() {
    $("#materi").DataTable({
        fixedHeader :true,
        language: {
            "zeroRecords": "Materi tidak ditemukan",
        },
        "autoWidth": false,
        responsive:true,
        // ajax : base_url+'pelanggan/data_pelanggan',
    });
});