var baseurl = $("#url").val();
var token = $("#token").val();
$(document).ready(function () {
    getData();
});

function getData() {
    $("#data-table").DataTable({
        paging: true,
        searching: false,
        info: true,
        ordering: true,
        bDestroy: true,
        ajax: {
            url: "/pesanan-pelanggan",
            type: "GET",
            dataSrc: function (json) {
                json.data.forEach(function (row, index) {
                    row.no = index + 1; // Menambahkan nomor data secara otomatis
                });
                return json.data;
            },
        },
        columns: [
            { data: "id_product" },
            { data: "nama" },
            { data: "meja" },
            { data: "action", width: "20%" },
        ],
    });
}

//show modal payment
$(document.body).on("click", "#detail", function (e) {
    // let id = $(this).attr("data-id");
    // tempId = id;
    $("#modalPay").modal("show");
});

