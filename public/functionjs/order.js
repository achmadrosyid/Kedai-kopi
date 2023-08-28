$(document).ready(function () {
    let currentURL = window.location.href;
    let urlParts = currentURL.split('/');
    let value = urlParts[urlParts.length - 1];
    if (localStorage['meja'] == null) {
        localStorage['meja'] = value
    }
    toastr.info('Anda berada pada meja ' + localStorage['meja']);
});

function getData() {
    let category = $('#filter-category').find(":selected").val();
    $.ajax({
        url: '/order/getProduct/' + category, method: 'GET', success: function (data) {
            let html = "";
            for (const element of data['product']) {
                let idProduct = element['id'];
                let imgSrc = '/storage/' + element['img'];
                let price = element['harga'];
                let name = element['nama']

                html += "<div class='col-lg-3 col-sm-6 col-xs-6'>";
                html += "<div class='card' style='width: 12rem;'>";
                html += "<img class='card-img-top' src='" + imgSrc + "' style='width: 12rem; height: 12rem;'>";
                html += "<div class='card-body'>"
                html += "<h5 class='card-title'>" + 'Rp.' + price + "</h5>";
                html += "<p class='card-text'>" + name + "</p>"
                html += "<a  class='btn btn-primary' style='width: 6rem;'  id='addToCart' data-id='" + idProduct + "' data-name='" + name + "'>Tambah</a>"
                html += "</div>";
                html += "</div>";
                html += "</div>";
            }
            document.getElementById('product').innerHTML = "";
            document.getElementById('product').innerHTML = html;
        }
    })
}

const cart = [];
$('body').on('click', '#addToCart', function () {
    const idProduct = $(this).data('id');
    const nameProduct = $(this).data('name')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/order/insertCart',
        method: 'POST',
        data: {
            idMeja: localStorage['meja'],
            idProduct: idProduct,
        },
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error('<strong><li>' + value + '</li></strong>');
                });
            } else {
                if (data.success === 1) {
                    swal.fire({
                        title: "Info",
                        icon: 'success',
                        text: nameProduct + " Berhasil ditambahkan ke keranjang",
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
    });
})
// modal show keranjang
$(document.body).on("click", "#keranjang", function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/order/getDataCart',
        method: 'POST',
        data: {
            idMeja: localStorage['meja']
        },
        success: function (data) {
            localStorage.setItem('cart', JSON.stringify(data['cart']));
            localStorage.setItem('total',data['total']);
            $('#totalHarga').text('Rp.'+data['total']);
            let html = "";
            for (let i = 0; i < data['cart'].length; i++) {
                let idProduct = data['cart'][i]['id'];
                html += "<tr>";
                html += "<td>" + (i + 1) + "</td>";
                html += "<td>" + data['cart'][i]['nama'] + "</td>";
                html += "<td>" + data['cart'][i]['total_qty'] + "</td>";
                html += "<td>" + 'Rp.' + data['cart'][i]['total_harga'] + "</td>";
                html += "<td><a href='javascript:void(0)' class='btn btn-success' id='addItem' data-id='" + idProduct + "'><i class='fa fa-plus'></i></a></td>";
                html += "<td><a href='javascript:void(0)' class='btn btn-danger' id='decreaseItem' data-id='" + idProduct + "'><i class='fa fa-minus'></i></a></td>";
                html += "</tr>";
            }
            document.getElementById('tableCart').innerHTML = "";
            document.getElementById('tableCart').innerHTML = html;
            $("#modalKeranjang").modal("show");
        },
    });

});
