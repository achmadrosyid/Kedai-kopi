var baseurl = $('#url').val();
var token = $('#token').val();
$(document).ready(function(){
    getData();
});
function getData() {
    $('#data-table').DataTable({
        paging      : true,
        searching   : false,
        info        : true,
        ordering    : true,
        bDestroy    : true,
        ajax: {
            url: '/category',
            type: "GET",
        },
        columns:[
            { data: 'nama'},
            { data: 'nama'},
            { data: 'action',width: "15%"}
        ],
    });
}
// add modal
function create(){
   $('#modalCreate').modal('show');
}
