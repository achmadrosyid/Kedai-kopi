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
            url: '/laporan-penjualan',
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
            { data: 'tanggal' },
            { data: 'transaction' },
            { data: 'total' },
        ],
    });
}

function filter() {
    const tglAwal = $('#tanggalAwal').val();
    const tglAkhir = $('#tanggalAkhir').val();
    if (tglAwal == '' || tglAkhir == '') {
        toastr.error('<strong><li>' + 'Harap isi Tanggal Awal Dan Tanggal Akhir' + '</li></strong>');
    } else {
        $('#data-table').DataTable({
            paging: true,
            searching: false,
            info: true,
            ordering: true,
            bDestroy: true,
            ajax: {
                url: '/laporan-penjualan/search',
                type: "GET",
                data: {
                    tglAwal: tglAwal,
                    tglAkhir: tglAkhir
                },
                dataSrc: function (json) {
                    json.data.forEach(function (row, index) {
                        row.no = index + 1; // Menambahkan nomor data secara otomatis
                    });
                    return json.data;
                }
            },
            columns: [
                { data: 'no', width: "5%" },
                { data: 'tanggal' },
                { data: 'transaction' },
                { data: 'total' },
            ],
        });
    }

}
$(document.body).on("click", "#cetak", function (e) {
    const tglAwal = $('#tanggalAwal').val();
    const tglAkhir = $('#tanggalAkhir').val();
    window.open('/laporan-penjualan/export/' + tglAwal + '/' + tglAkhir)
})
