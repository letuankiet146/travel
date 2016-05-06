// load xem them
function load_paging(){
    $(".viewdetail").html("Loading...");
    var area = $("#area_id ul li.active input").val();
    var ffrom = $("#from").val();
    var to = $("#to").val();
    var price = $("#price").val();
    var time = $("#time").val();
    var keyword = $("#t-keyword").val();
    var lastID = $(".viewdetail").closest('.grid-tour').find('.row-tour').children(':last').attr("item-id");
    $.ajax({
        url: 'model/paging.php?type=list',
        type: 'POST',
        dataType: 'text',
        data: {
            area: area,
            ffrom: ffrom,
            to: to,
            time: time,
            price: price,
            lastID: lastID,
            keyword: keyword
        },
    })
    .done(function(data) {
        if(data == 0){
            $(".pagination").remove();
        }  
        else{  
            $(".viewdetail").html("Xem thêm");  
            $('.row-tour').append(data); 
        }  
    });
}

$(document).ready(function() {
    
});
