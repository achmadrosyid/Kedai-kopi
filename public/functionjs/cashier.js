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
            url: '/cashier',
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
            {data: 'email'},
            {data: 'password'},
            {data: 'nomer'},
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
    let nama = $('#nama').val();
    let email = $('#email').val();
    let password = $('#password').val();
    let nomer = $('#nomer').val();

    $.ajax({
        url: '/cashier/store',
        method: 'POST',
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