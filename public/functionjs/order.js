$(document).ready(function () {
    // getData();
});
function getData() {
    var category = $('#filter-category').find(":selected").val();
    // alert(category);
    $.ajax({
        url: '/order/getProduct/' + category,
        method: 'GET',
        success: function (data) {
            console.log(data);
            console.log(data['product']);
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
                html += "<a  class='btn btn-primary' style='width: 6rem;'>Tambah</a>"
                html += "</div>";
                html += "</div>";
                html += "</div>";
            }
            document.getElementById('product').innerHTML = "";
            document.getElementById('product').innerHTML = html;
        }
    })
}
