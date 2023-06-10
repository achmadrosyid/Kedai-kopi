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
            {data: 'id_category'},
            {data: 'img'},
            {data: 'nama'},
            {data: 'description'},
            {data: 'status'},
            {data: 'harga'},
            {data: 'action', width: "15%"}
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
    alert('test');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    $.ajax({
        url: '/product/getCategory',
        method: 'GET', 
        success: function (data) {
            consol.log (data);
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
    let id_category = $('#id_category').val();
    let nama = $('#nama').val();
    let description = $('#description').val();
    let status = $('#status').val();
    let harga = $('#harga').val();

    $.ajax({
        url: '/product/store',
        method: 'POST',
        data: {
            id: id,
            id_category: id_category,
            img : img,
            nama: nama,
            description: description,
            status: status,
            harga: harga,
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