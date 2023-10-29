var baseurl = $('#url').val();
var token = $('#token').val();
$(document).ready(function () {
    getData();
});

function getData() {
    $('#data-table').DataTable({
        paging: true,
        searching: true,
        info: true,
        ordering: true,
        bDestroy: true,
        ajax: {
            url: '/product',
            type: "GET",
            dataSrc: function (json) {
                json.data.forEach(function (row, index) {
                    row.no = index + 1; // Menambahkan nomor data secara otomatis
                });
                return json.data;
            }
        },
        columns: [
            { data: 'no' },
            { data: 'img' },
            { data: 'category' },
            { data: 'nama' },
            { data: 'description' },
            { data: 'status' },
            { data: 'harga' },
            { data: 'diskon' },
            { data: 'action', width: "15%" }
        ],
    });
}

// add modal
function create() {
    $('#form').trigger("reset");
    getCategory();
    $('#modalCreate').modal('show');
}

// get category
function getCategory() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({
        url: '/product/getCategory',
        method: 'GET',
        success: function (data) {
        }
    });

}

//tombol simpan di klik
$('#simpan').click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    let id = $('#id').val();
    let img = $('#img').val();
    let id_category = $('#tipe_category').val();
    let nama = $('#nama').val();
    let description = $('#description').val();
    let status = $('#tipe_status').val();
    let harga = $('#harga').val();
    let diskon = $('#diskon').val();

    $.ajax({
        url: '/product/store',
        method: 'POST',
        data: {
            id: id,
            img: img,
            id_category: id_category,
            nama: nama,
            description: description,
            status: status,
            harga: harga,
            diskon: diskon,
        },
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error('<strong><li>' + value + '</li></strong>');
                });
            } else {
                if (data.success === 1) {
                    getData();
                    $('#modalCreate').modal('hide');
                    $('#form').trigger("reset");
                    toastr.success('Data Berhasil Di Simpan');
                } else {
                    toastr.warning('Data Gagal Disimpan')
                }

            }
        }
    })
})

//modal edit
$(document.body).on("click", "#my-btn-edit", function (e) {
    let id = $(this).attr("data-id");

    $.ajax({
        url: "/product/edit/" + id,
        method: "GET",
        success: function (data) {
            $("#id").val(data.data.id);
            $("#namaEdit").val(data.data.nama);
            $("#tipe_categoryEdit").val(data.data.id_category);
            $("#descriptionEdit").val(data.data.description);
            $("#tipe_statusEdit").val(data.data.status);
            $("#hargaEdit").val(data.data.harga);
            $("#diskonEdit").val(data.data.diskon);
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
    let id = $('#id').val();
    let id_category = $('#tipe_categoryEdit').val();
    let nama = $('#namaEdit').val();
    let description = $('#descriptionEdit').val();
    let status = $('#tipe_statusEdit').val();
    let harga = $('#hargaEdit').val();
    let diskon = $('#diskonEdit').val();

    $.ajax({
        url: "/product/update",
        method: "POST",
        data: {
            id: id,
            id_category: id_category,
            nama: nama,
            description: description,
            status: status,
            harga: harga,
            diskon: diskon,
        },
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error("<strong><li>" + value + "</li></strong>");
                });
            } else {
                if (data.success === 1) {
                    getData();
                    $("#modalEdit").modal("hide");
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
        url: "/product/delete/" + tempId,
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
