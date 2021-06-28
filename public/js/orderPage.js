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
  

      $('#form-royaltyFee').val($('#royaltyFee').html());
      $('#form-msrp').val($('#frame-price').html());
      $('#form-totalPrice').val($('#total').html());
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
