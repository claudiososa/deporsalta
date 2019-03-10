
$(document).ready(function () {  
    $('#cost').change( function(){      
      $('[id ^=priceCost]').val($(this).val())           
    })

    $('#client').change( function(){
      $('[id ^=priceClient]').val($(this).val())      
      $('#createButton').focus()
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
