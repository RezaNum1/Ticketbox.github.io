$(document).ready(function () {
    let total = 0;
    $(".checks-out").bind('onclick',function (e) {
        total = 0;

        $( ".card" ).each(function( index ) {
            let dt1 = new Date($(this).find('.checks-in').val())
            let dt2 = new Date($(this).find('.checks-out').val())

            let sum =  Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24))
            total += sum;
        });

        $("#total-price").text(total);
    })

})