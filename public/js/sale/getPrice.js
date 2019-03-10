$(document).ready(function () {  
    console.log($('#product_id').val())
    let product_id = $('#product_id').val()
    
    $('#waist_id').change(function (){
        let waist_id = $('#waist_id').val()
        console.log($(this).val())
        console.log($('#product_id').val())
        $.ajax({
            type: 'GET',
            url: '/sale/addItem/' + product_id +'/' + waist_id,
            //dataType: 'json',
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                console.log('volvio bien')
                console.log(data.id)
                $('#priceUnit').val(data.price_sale)
                $('#quantity').val('1')
                $('#total').val(data.price_sale)
            }
        });
    })

    $('#quantity').change(function (){
        let total = $(this).val()*$('#priceUnit').val()        
        $('#total').val(total)
    })

    $('#priceUnit').change(function (){
        let total = $(this).val()*$('#quantity').val()        
        $('#total').val(total)
    })

    

    $('[id ^=saledetail]').on('click', function(){

        //alert($(this).attr('id').substr(4));
        let id = $(this).attr('id').substr(10)
        
        $.ajax({
            type: 'GET',
            url: '/saledetail/delete/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                console.log('llego bien luego de borrar')
                console.log(data)                
                updateTotal()
                $('#rowDetail' + id).remove();                
            }
        });
    });

    function updateTotal(){
        $.ajax({
            type: 'GET',
            url: '/saledetail/sum/' + sale_id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                console.log('sumando')
                console.log(data)                                
                $('#totalSale').empty();                
                $('#totalSale').text('$ '+data);                
            }
        });
    }
});
