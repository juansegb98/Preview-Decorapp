$(document).ready(function(){

//   CURRENCY CONVERSION
var formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
    });
    
    framePriceString = $('#frame-price').text();
    framePriceNumber = Number(framePriceString.replace(/[^0-9\.]+/g,""));
    msrp = parseInt(framePriceNumber);
    royaltyFee = parseInt($('#royaltyFee').text())
    total = msrp + royaltyFee;
    $('#royaltyFee').text(formatter.format(royaltyFee))
    $('#total').text(formatter.format(total))

});

function sendMail() {
    $('#email-modal').modal('hide');
    $.ajax({
        url:BASE_URL+"/quote_mail",
        method: "POST",
        data: {
            userImagePath: $('#imageName').val(),
            objDesignArt: $('#objDesignArt').val(),
            objDesignFrame: $('#objDesignFrame').val(),
            objDesignLiner: $('#objDesignLiner').val(),
            email: $('#email-input').val(),
            royaltyFee: $('#royaltyFee').html(),
            msrp: $('#frame-price').html(),
            totalPrice: $('#total').html(),
            observations: $('#design-information').html(),
            tvSize: $('#tvSize').val(),
            externalSpeakers: $('#externalSpeakers').val()
        },
        success: function (response){
            console.log(response)
            console.log("success")
        },
        error: function(e){
            alert(e.responseJSON.message)
        }
    });
}