
$(document).ready(function () {  

    $('#total').val($('#priceUnit').val()*$('#quantity').val())
    
    $('#quantity').change( function() {        
       $('#total').val($('#priceUnit').val()*$('#quantity').val())
  });

  $('#priceUnit').change( function() {        
    $('#total').val($('#priceUnit').val()*$('#quantity').val())
 });
});
