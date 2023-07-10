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
        bDestroy: false,
        ajax: {
            url: '/category',
            type: "GET",
            dataSrc: function (json) {
                console.log('json', json)
                json.data.forEach(function (row, index) {
                    row.no = index + 1; // Menambahkan nomor data secara otomatis
                });
                return json.data;
            }
        },
        columns: [
            {data: 'no'},
            {data: 'nama'},
            {data: 'action', width: "20%"}
        ],
    });
}

// add modal
function create() {
    $('#form').trigger("reset");
    $('#modalCreate').modal('show');
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
    let category = $('#category').val();

    $.ajax({
        url: '/category/store',
        method: 'POST',
        data: {
            id: id,
            category: category,
        },
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error('<strong><li>' + value + '</li></strong>');
                });
            } else {
                if(data.success === 1){
                    getData();
                    $('#modalCreate').modal('hide');
                    $('#form').trigger("reset");
                    toastr.success('Data Berhasil Di Simpan');
                }else{
                    toastr.warning('Data Gagal Disimpan')
                }
            }
        }
    })
})

//modal edit
$(document.body).on("click","#my-btn-edit", function (e) {
    let id = $(this).attr("data-id")
 
 $.ajax({
    url: '/category/edit/'+id,
    method: 'GET',
    success: function (data) {
        $('#id').val(data.data.id);
        $('#category-edit').val(data.data.nama);
        $('#modalEdit').modal('show'); 
    }
    })
});

// update action
$('#editSimpan').click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    let id = $('#id').val();
    let category = $('#category-edit').val();

    $.ajax({
        url: '/category/update',
        method: 'POST',
        data: {
            id: id,
            category: category,
        },
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error('<strong><li>' + value + '</li></strong>');
                });
            } else {
                if(data.success === 1){
                    getData();
                    $('#editSimpan').modal('hide');
                    toastr.success('Data Berhasil Di Simpan');
                }else{
                    toastr.warning('Data Gagal Disimpan')
                }
            }
        }
    })
})

//modal delete
$(document.body).on("click","#my-btn-delete", function (e) {
    let id = $(this).attr("data-id");
    tempId = id;
    $("#modalDelete").modal("show");
});
// delete
$(document.body).on("click", "#delete", function (e) {
    var id = $("#id").val();
    e.preventDefault();
    $.ajax({
        url: "/category/delete/" + tempId,
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

