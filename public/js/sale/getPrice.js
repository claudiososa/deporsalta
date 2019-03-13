$(document).ready(function () {  
    $('#montoEfectivo').val($('#totalSale').val()).focus()
    let montoTotal = $('#totalSale').val()
    let montoTarjeta = $('#montoTarjeta').val()
    let montoEfectivo = $('#montoEfectivo').val()

    


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

    $('#tipoTarjeta').change(function (){
        if ($(this).val()=='credito') {
            $('#trCuotas').show()
        }
        if ($(this).val()=='debito') {
            $('#trCuotas').hide()
        }
    })

    $('#quotas').change(function (){
        let montoTarjeta = $('#montoTarjeta').val()
        let porcent =$(this).val()
        let quotas = $('select[id="quotas"] option:selected').text()
        
        
        let valor = 1 + (quotas * porcent)
        let priceTotal = valor * montoTarjeta
        if (quotas == '1') {
            $('#montoTarjetaCuotas').val(montoTarjeta)    
        }else{
            $('#montoTarjetaCuotas').val(priceTotal)    
        }

        
        console.log(valor)
        console.log(priceTotal)
    })

    $('#montoEfectivo').change(function (){
        montoTarjeta = montoTotal - $('#montoEfectivo').val()
        $('#montoTarjeta').val(montoTarjeta)      
    })

    $('#montoTarjeta').change(function (){
        montoEfectivo = montoTotal - $('#montoTarjeta').val()
        $('#montoEfectivo').val(montoEfectivo)      
    })

    $('#confirmSale').click(function (){
        console.log('presionaste confirmSale')
        let montoEfectivo = $('#montoEfectivo').val()
        let tipoTarjeta = $('#tipoTarjeta').val()
        let montoTarjeta = $('#montoTarjeta').val()
        $.ajax({
            type: 'POST',
            url: '/sale/confirm/',
            data: {
                '_token': $('input[name=_token]').val(),
                'sale_id': sale_id,
                'montoEfectivo': montoEfectivo,
                'tipoTarjeta': tipoTarjeta,
                'montoTarjeta' : montoTarjeta
            },
            success: function(data) {
                console.log('sumando')
                console.log(data) 
                $('[id ^=rowDetail]').empty();
                $('#rowTotal').empty();                                
                $('#rowConfirmSale').empty();                                
            }
        });
    })

    // $('#confirmSale').click(function (){
    //     console.log('presionaste confirmSale')
    //     $.ajax({
    //         type: 'GET',
    //         url: '/sale/confirm/' + sale_id,
    //         data: {
    //             '_token': $('input[name=_token]').val(),
    //         },
    //         success: function(data) {
    //             console.log('sumando')
    //             console.log(data) 
    //             $('[id ^=rowDetail]').empty();
    //             $('#rowTotal').empty();                                
    //             $('#rowConfirmSale').empty();                                
    //         }
    //     });
    // })
});
