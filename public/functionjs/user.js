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
            url: '/user',
            type: "GET",
            dataSrc: function (json) {
                json.data.forEach(function (row, index) {
                    row.no = index + 1; // Menambahkan nomor data secara otomatis
                });
                return json.data;
            }
        },
        columns: [
            { data: 'no', width: "5%" },
            { data: 'name' },
            { data: 'roles' },
            { data: 'action', width: "20%" }
        ],
    });
}

// add modal
function create() {
    $('#form').trigger("reset");
    getCashier();
    $('#modalCreate').modal('show');
}

function getCashier() {
    $.ajax({
        url: '/user/getCashier',
        type: 'GET',
        success: function (data) {
            var html = "";
            var titleSelect = "Pilih Pegawai Kasir";
            html += "<option value=''>" + titleSelect + "</option>";
            for (i = 0; i < data.data.length; i++) {
                var id = data.data[i].id;
                var name = data.data[i].name;
                html += "<option value='" + id + "'>" + name + "</option>"
            }
            document.getElementById('employee').innerHTML = "";
            document.getElementById('employee').innerHTML = html;
        }
    });
}

$('#simpan').click(function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const name = $('#name').val();
    const email = $('#email').val();
    const roles = $('#roles').val();
    const password = $('#password').val();
    const cashier = $('#employee').val();
    $.ajax({
        url: '/user/store',
        type: 'POST',
        data: {
            name: name,
            email: email,
            roles: roles,
            password: password,
            cashier: cashier
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
    });
})
