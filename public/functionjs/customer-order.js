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
            url: "/customer-order",
            type: "GET",
            dataSrc: function (json) {
                console.log("json", json);
                json.data.forEach(function (row, index) {
                    row.no = index + 1; // Menambahkan nomor data secara otomatis
                });
                return json.data;
            },
        },
        columns: [
            { data: "id" },
            { data: "detail_product" },
            { data: "nama" },
            { data: "meja" },
            { data: "jumlah" },
            { data: "action", width: "20%" },
        ],
    });
}

// add modal show
function create() {
    $("#form").trigger("reset");
    $("#modalCreate").modal("show");
}