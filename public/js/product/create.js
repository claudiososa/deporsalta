
$(document).ready(function () {  
    $('#priceReven').change( function() {        
    let diferencia =  $(this).val()-$('#priceCost').val()      
    let marginReseller = Math.round((diferencia / $('#priceCost').val())*100)     
    $('#marginReseller').val(marginReseller)      
  });

  $('#priceClient').change( function() {        
    let diferencia =  $(this).val()-$('#priceCost').val()      
    let marginClient = Math.round((diferencia / $('#priceCost').val())*100)     
   $('#marginClient').val(marginClient)
 });
});
