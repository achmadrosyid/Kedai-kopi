var baseurl = $("#url").val();
var token = $("#token").val();
$(document).ready(function () {
    getData();
});



$('#category-filter').change(function() {
  console.log();
  let category = $(this).val();
  var url = "{{ route('user.edit', :category) }}";
  url = url.replace(':category', category);
	location.href = url;
  // console.log(category);
  //   // window.location.href = "/category/" + category;
  //   window.location.href = "{{ route('kedai-kopi-super.category', ':category')}}";
 
});