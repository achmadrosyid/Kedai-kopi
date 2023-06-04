var baseurl = $('#url').val();
var token = $('#token').val();
$(document).ready(function () {
    console.log('wowowo')
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
            url: '/product',
            type: "GET",
            dataSrc: function (json) {
                console.log('masukk', json)
                json.data.forEach(function (row, index) {
                    row.no = index + 1; // Menambahkan nomor data secara otomatis
                });
                return json.data;
            }
        },
        columns: [
            {data: 'no'},
            {data: 'img'},
            {data: 'nama'},
            {data: 'category'},
            {data: 'description'},
            {data: 'status'},
            {data: 'price'},
            {data: 'action', width: "15%"}
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
    let img = $('#img').val();
    let product = $('#product').val();
    let category = $('#category').val();
    let description = $('#description').val();
    let status = $('#status').val();
    let price = $('#price').val();

    $.ajax({
        url: '/product/store',
        method: 'POST',
        data: {
            id: id,
            img: img,
            nama : product,
            category: category,
            description: description,
            status: status,
            harga: price,
        },
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error('<strong><li>' + value + '</li></strong>');
                });
            } else {

            }
        }
    })
})