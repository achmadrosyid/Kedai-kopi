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
            url: '/meja',
            type: "GET",
            dataSrc: function (json) {
                json.data.forEach(function (row, index) {
                    row.no = index + 1; // Menambahkan nomor data secara otomatis
                });
                return json.data;
            }
        },
        columns: [
            {data: 'no', width: "5%"},
            {data: 'meja'},
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
    let meja = $('#meja').val();

    $.ajax({
        url: '/meja/store',
        method: 'POST',
        data: {
            id: id,
            meja: meja,
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
    url: '/meja/edit/'+id,
    method: 'GET',
    success: function (data) {
        $('#id').val(data.data.id);
        $('#meja-edit').val(data.data.meja);
        $('#modalEdit').modal('show');
        $('#printQr').attr('data-id', JSON.stringify(data.data.id)) 
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
    let meja = $('#meja-edit').val();

    $.ajax({
        url: '/meja/update',
        method: 'POST',
        data: {
            id: id,
            meja: meja,
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
        url: "/meja/delete/" + tempId,
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

//on print
$('#printQr').on("click", () => {
    const idTable = $('#printQr').attr('data-id');
    var qrCodeBaseUri = 'https://api.qrserver.com/v1/create-qr-code/?',
    params = {
        data: 'kafe-super.sdn001be.com/order/' + idTable, // Menggunakan idTable yang sudah didefinisikan
        size: '400x400',
        margin: 20,
        bgcolor: '#FF0000',
        // more configuration parameters ...
        download: 1
    };

    window.location.href = qrCodeBaseUri + $.param(params);
})


