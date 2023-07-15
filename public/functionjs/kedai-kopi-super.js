var baseurl = $("#url").val();
var token = $("#token").val();
$(document).ready(function () {
    getData();
});


function category() {
    const selectedCategory = document.getElementById("category-dropdown").value;
    let url = "";
  
    if (selectedCategory === "kategori1") {
      url = "kategori1.html";
    } 
  
    if (url) {
      window.location.href = url;
    }
  }
  