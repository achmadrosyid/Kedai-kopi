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

//modal edit
$(document.body).on("click", "#my-btn-edit", function (e) {
    let id = $(this).attr("data-id");

    $.ajax({
        url: "/customer-order/edit/" + id,
        method: "GET",
        success: function (data) {
            $("#id").val(data.data.id);
            $("#nama").val(data.data.nama);
            $("#meja").val(data.data.meja);
            $("#produk").val(data.data.detail_product);
            $("#jumlah").val(data.data.jumlah);
            $("#modalEdit").modal("show");
        },
    });
});

// update action
$("#editSimpan").click(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    e.preventDefault();
    let id = $("#id").val();
    let nama = $("#nama").val();
    let meja = $("#meja").val();
    let detail_product = $("#produk").val();
    let jumlah = $("#jumlah").val();

    $.ajax({
        url: "/customer-order/update",
        method: "POST",
        data: {
            id: id,
            nama: nama,
            meja: meja,
            detail_product: detail_product,
            jumlah: jumlah,
        },
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error("<strong><li>" + value + "</li></strong>");
                });
            } else {
                if (data.success === 1) {
                    getData();
                    $("#editSimpan").modal("hide");
                    toastr.success("Data Berhasil Di Simpan");
                } else {
                    toastr.warning("Data Gagal Disimpan");
                }
            }
        },
    });
});

//show modal payment
$(document.body).on("click", "#my-btn-pay", function (e) {
    let id = $(this).attr("data-id");
    tempId = id;
    $("#modalPay").modal("show");
});

