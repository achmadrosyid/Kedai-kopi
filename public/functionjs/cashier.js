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
                json.data.forEach(function (row, index) {
                    row.no = index + 1; // Menambahkan nomor data secara otomatis
                });
                return json.data;
            }
        },
        columns: [
            {data: 'no'},
            {data: 'nama'},
            {data: 'password'},
            {data: 'nomer'},
            {data: 'action', width: "15%"}
        ],
    });
}

// add modal
function create() {
    $('#modalCreate').modal('show');
}
