
$(document).ready(function () {  
    $('#cost').change( function(){
      $('[id ^=priceCost]').val('444')
      
      //alert('perdio el focus cost')
    })

    $('#client').change( function(){
      $('[id ^=priceClient]').val('99')
      //alert('perdio el focus client')
    })  

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
