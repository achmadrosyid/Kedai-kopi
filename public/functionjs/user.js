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

$(document.body).on("click", "#my-btn-edit", function (e) {
    let id = $(this).attr("data-id")
    $.ajax({
        url: '/user/edit/' + id,
        type: 'GET',
        success: function (data) {
            $('#idEdit').val(id)
            $('#nameEdit').val(data.data.name);
            $('#emailEdit').val(data.data.email);
            $('#cashier_id').val(data.data.id_cashier);
            $('#passwordEdit').val(null);
            $("div.Roles select").val(data.data.roles).change();
            getCashierEdit();
            $('#modalEdit').modal('show');
        }
    });
});

function getCashierEdit() {
    const employee = parseInt($('#cashier_id').val());
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
                if (id === employee) {
                    html += "<option selected='true' value='" + id + "'>" + name + "</option>"
                } else {
                    html += "<option value='" + id + "'>" + name + "</option>"
                }
            }
            document.getElementById('employeeEdit').innerHTML = "";
            document.getElementById('employeeEdit').innerHTML = html;
        }
    });
}

$(document.body).on("click", "#simpanEdit", function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const id = $('#idEdit').val();
    const name = $('#nameEdit').val();
    const email = $('#emailEdit').val();
    const cashier = $('#employeeEdit').val();
    const roles = $('#rolesEdit').val();
    const password = $('#passwordEdit').val();
    $.ajax({
        url: 'user/update',
        type: 'POST',
        data: {
            id: id,
            name: name,
            email: email,
            cashier: cashier,
            roles: roles,
            password: password
        },
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error('<strong><li>' + value + '</li></strong>');
                });
            } else {
                if (data.success === 1) {
                    getData();
                    $('#modalEdit').modal('hide');
                    $('#form').trigger("reset");
                    toastr.success('Data Berhasil Di Simpan');
                } else {
                    toastr.warning('Data Gagal Disimpan')
                }
            }
        }
    });
})
