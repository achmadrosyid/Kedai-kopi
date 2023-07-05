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
            url: "/cashier",
            type: "GET",
            dataSrc: function (json) {
                json.data.forEach(function (row, index) {
                    row.no = index + 1; // Menambahkan nomor data secara otomatis
                });
                return json.data;
            },
        },
        columns: [
            { data: "no" },
            { data: "nama" },
            { data: "email" },
            { data: "password" },
            { data: "nomer" },
            { data: "action", width: "20%" },
        ],
    });
}

// add modal show
function create() {
    $("#form").trigger("reset");
    $("#modalCreate").modal("show");
}

//tombol simpan di klik
$("#simpan").click(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    e.preventDefault();
    let id = $("#id").val();
    let nama = $("#nama").val();
    let email = $("#email").val();
    let password = $("#password").val();
    let nomer = $("#nomer").val();

    $.ajax({
        url: "/cashier/store",
        method: "POST",
        data: {
            id: id,
            nama: nama,
            email: email,
            password: password,
            nomer: nomer,
        },
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error("<strong><li>" + value + "</li></strong>");
                });
            } else {
                if (data.success === 1) {
                    getData();
                    $("#modalCreate").modal("hide");
                    $("#form").trigger("reset");
                    toastr.success("Data Berhasil Di Simpan");
                } else {
                    toastr.warning("Data Gagal Disimpan");
                }
            }
        },
    });
});

//modal edit
$(document.body).on("click", "#my-btn-edit", function (e) {
    let id = $(this).attr("data-id");

    $.ajax({
        url: "/cashier/edit/" + id,
        method: "GET",
        success: function (data) {
            $("#id").val(data.data.id);
            $("#namaEdit").val(data.data.nama);
            $("#emailEdit").val(data.data.email);
            $("#passwordEdit").val(data.data.password);
            $("#nomerEdit").val(data.data.nomer);
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
    let nama = $("#namaEdit").val();
    let email = $("#emailEdit").val();
    let password = $("#passwordEdit").val();
    let nomer = $("#nomerEdit").val();

    $.ajax({
        url: "/cashier/update",
        method: "POST",
        data: {
            id: id,
            nama: nama,
            email: email,
            password: password,
            nomer: nomer,
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

let tempId = null;

//modal delete
$(document.body).on("click", "#my-btn-delete", function (e) {
    let id = $(this).attr("data-id");
    tempId = id;
    $("#modalDelete").modal("show");
});
// delete
$(document.body).on("click", "#delete", function (e) {
    var id = $("#id").val();
    e.preventDefault();
    $.ajax({
        url: "/cashier/delete/" + tempId,
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            if (res.data.succes) {
                toastr.success("Data berhasil dihapus!");
                getData();
                $("#modalDelete").modal("hide");
            }
        },
    });
});
