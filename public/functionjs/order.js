$(document).ready(function () {
    var currentURL = window.location.href;
    var urlParts = currentURL.split('/');
    var value = urlParts[urlParts.length - 1];
    if (localStorage['meja'] == null) {
        localStorage['meja'] = value
    }
    toastr.info('Anda berada pada meja ' + localStorage['meja']);
});

function getData() {
    var category = $('#filter-category').find(":selected").val();
    // alert(category);
    $.ajax({
        url: '/order/getProduct/' + category, method: 'GET', success: function (data) {
            var html = "";
            for (let i = 0; i < data['product'].length; i++) {
                let idProduct = data['product'][i]['id'];
                let imgSrc = '/storage/' + data['product'][i]['img'];
                let price = data['product'][i]['harga'];
                let name = data['product'][i]['nama']

                html += "<div class='col-lg-3 col-sm-6 col-xs-6'>";
                html += "<div class='card' style='width: 12rem;'>";
                html += "<img class='card-img-top' src='" + imgSrc + "' style='width: 12rem; height: 12rem;'>";
                html += "<div class='card-body'>"
                html += "<h5 class='card-title'>" + price + "</h5>";
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
    // toastr.success(nameProduct + ' Berhasil Di Tambahkan');
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
                if(data.success === 1){
                    swal.fire({
                        title: "Info",
                        icon: 'success',
                        text: nameProduct + " Berhasil ditambahkan ke keranjang",
                        type: "success",
                        timer: 3000,
                        showCancelButton: false,
                        showConfirmButton: false
                    })
                }else{
                    toastr.warning('Data Gagal Disimpan')
                }
            }
        }
    });
})
// modal show keranjang
$(document.body).on("click", "#keranjang", function (e) {
    $("#modalKeranjang").modal("show");
});
