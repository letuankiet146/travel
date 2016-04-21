
$(document).ready(function () {
    var order_id = $("#order_id").val();
    $.ajax({
        url: 'http://localhost:8080/spr-data/updateOrderTour',
        type: 'POST',
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify({
            formOrderIdDto: (order_id-1),
            formOrderIsPayDto: 5
        }), 
    })
    .done(function() {

    })
    .fail(function() {

    })
    .always(function() {
        setTimeout(function() {
            window.location.href = "index.php?page=dang-nhap";
        },5000);
    });
});

