function addToCart(itemId) {
    //XXX
    console.log('js-addToCart()');

    $.ajax({
        type: 'POST',
        async: false,
        url: '/?controller=cart&action=addtocart&id=' + itemId + '/',
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems']);
                $('#addCart_' + itemId).hide();
                $('#removeFromCart_' + itemId).show();
            }
        }
    });
}

function removeFromCart(itemId) {
    //XXX
    console.log("js-emoveFromCart(" + itemId + ")");

    $.ajax({
        type: 'POST',
        async: false,
        url: '/?controller=cart&action=removefromcart&id=' + itemId + '/',
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems']);
                $('#addCart_' + itemId).show();
                $('#removeFromCart_' + itemId).hide();
            }
        }
    });
}