var baseurl = $('#url').val();
var token = $('#token').val();
$(document).ready(function () {
    getData();
});

function getData() {
    $('#data-table').DataTable({
        paging: true,
        searching: false,
        info: true,
        ordering: true,
        bDestroy: true,
        ajax: {
            url: '/keranjang',
            type: "GET",
            dataSrc: function (json) {
                json.data.forEach(function (row, index) {
                    row.no = index + 1; // Menambahkan nomor data secara otomatis
                });
                return json.data;
            }
        },
        columns: [
            {data: 'no'},
            {data: 'img'},
            {data: 'category'},
            {data: 'nama'},
            {data: 'jumlah'},
            {data: 'status'},
            {data: 'harga'},
            {data: 'action', width: "20%"}
        ],
    });
}

$(document.body).on("click", "#bayar", function (e) {
    // let id = $(this).attr("data-id");
    // tempId = id;
    $("#modalNama").modal("show");
});