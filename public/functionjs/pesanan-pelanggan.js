var baseurl = $("#url").val();
var token = $("#token").val();
$(document).ready(function () {
    getData();
    $('#antar').hide();
    $("input").prop('disabled', false);
    // setInterval(getData, 3000);
});

function getData() {
    $("#data-table").DataTable({
        paging: true,
        searching: true,
        info: true,
        ordering: true,
        bDestroy: true,
        ajax: {
            url: "/pesanan-pelanggan",
            type: "GET",
            dataSrc: function (json) {
                json.data.forEach(function (row, index) {
                    row.no = index + 1; // Menambahkan nomor data secara otomatis
                });
                return json.data;
            },
        },
        columns: [
            { data: 'no', width: "5%" },
            { data: "nama" },
            { data: "meja" },
            { data: "status_pesanan" },
            { data: "status_pembayaran" },
            { data: "action", width: "20%" },
        ],
    });
}

//show modal payment
$(document.body).on("click", "#detail", function (e) {
    let id = $(this).attr("data-id");
    $.ajax({
        url: '/pesanan-pelanggan/getDetil/' + id,
        type: 'GET',
        success: function (data) {
            localStorage.setItem('totalOrder', data['totalINT']);
            $('#idOrder').val(data['id']);
            $('#totalHarga').text('Rp.' + data['total']);
            let html = "";
            for (let i = 0; i < data['order'].length; i++) {
                let nameProduct = data['order'][i]['nama'];
                html += "<tr>";
                html += "<td>" + (i + 1) + "</td>";
                html += "<td>" + nameProduct + "</td>";
                html += "<td>" + data['order'][i]['jumlah'] + "</td>";
                html += "<td>" + "<input type='number' class='form-control' id='diskon'>" + "</td>";
                html += "</tr>";
            }
            document.getElementById('tableOrder').innerHTML = "";
            document.getElementById('tableOrder').innerHTML = html;
            if (data['statusBayar'] == 1) {
                $('#bayar').hide();
                $('#antar').show();
                $("input").prop('disabled', true);
            } else {
                $('#bayar').show();
                $('#antar').hide();
                $("input").prop('disabled', false);
            }
            if (data['statusPesanan'] == 1) {
                $('#antar').hide();
            }
            $("#modalPay").modal("show");
        }
    });

});
$(document).on("change", "#diskon", function (e) {
    const discount = $(this).val();
    countDiscount(discount)

});

function countDiscount(discount) {
    const newTotal = parseInt(localStorage.getItem('totalOrder')) - discount;
    localStorage.setItem('totalOrder', newTotal);
    var formattedNumber = (newTotal / 1000).toFixed(3);
    $('#totalHarga').text('Rp.' + formattedNumber);
}
$(document.body).on("click", "#bayar", function (e) {
    e.preventDefault();
    const totalPayment = localStorage.getItem('totalOrder');
    const idOrder = $('#idOrder').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/pesanan-pelanggan/purchase/',
        type: 'POST',
        data: {
            totalPayment: totalPayment,
            idOrder: idOrder,
        },
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error('<strong><li>' + value + '</li></strong>');
                });
            } else {
                if (data.success === 1) {
                    $("#modalPay").modal("hide");
                    localStorage.clear();
                    getData();
                    swal.fire({
                        title: "Success",
                        icon: 'success',
                        text: "Pembayaran Berhasil",
                        type: "success",
                        timer: 3000,
                        showCancelButton: false,
                        showConfirmButton: false
                    })
                } else {
                    toastr.warning('Data Gagal Disimpan')
                }
            }
        }
    })
});

$(document.body).on("click", "#antar", function (e) {
    e.preventDefault();
    const idOrder = $('#idOrder').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/pesanan-pelanggan/deliverOrder/',
        type: 'POST',
        data: {
            idOrder: idOrder
        },
        success: function (data) {
            if (data.success === 1) {
                $("#modalPay").modal("hide");
                localStorage.clear();
                getData();
                swal.fire({
                    title: "Success",
                    icon: 'success',
                    text: "Pesanan Diantar",
                    type: "success",
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                })
            } else {
                toastr.warning('Data Gagal Disimpan')
            }
        }
    });
})
