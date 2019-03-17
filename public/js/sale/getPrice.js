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

    $('#quantity').on('change', function(){
        alert('hola')
        let total = $(this).val()*$('#priceUnit').val()        
        $('#total').val(total)
    })

    $('#priceUnit').change(function (){
        let total = $(this).val()*$('#quantity').val()        
        $('#total').val(total)
    })

    
    $('[id ^=radio').on('click', function(){//botones radio seleccion de talle

        //alert($(this).attr('id').substr(5));
        $("#agregarItem").prop('disabled', false);
        let waist_id = $(this).attr('id').substr(5)        
        let product_id = $('#product_id').val()

        $('#waist_id').val(waist_id)

        $.ajax({
            type: 'POST',
            url: '/sale/price/unit/',
            data: {
                '_token': $('input[name=_token]').val(),                
                'waist_id': waist_id,
                'product_id': product_id                
            },
            success: function(data) {
                console.log('sumando')
                console.log(data) 
                //$('[id ^=rowDetail]').empty();
                
                $('#priceUnit').val(data.price_sale);
                $('#total').val(data.price_sale);
                $('#divQuantity').empty()
                $(`<input max="${data.quantity}" min="1" type="number" name="quantity" id="quantity" value="1" class='form-control'>`).appendTo('#divQuantity')

                $('#quantity').on('change', function(){                    
                    let total = $(this).val()*$('#priceUnit').val()        
                    $('#total').val(total)
                })
                //$('#rowConfirmSale').empty();                                
            }
        });
    });

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
            let montoTarjeta = $('#montoTarjeta').val()
            $('#montoTarjetaCuotas').val(montoTarjeta)
            $('#trCuotas').show()
            $('#trAmountQuota').show()
        }
        if ($(this).val()=='debito') {
            $('#trCuotas').hide()
        }
    })

    $('#quotas').change(function (){//al cambiar valor en select de cuotas
        let montoTarjeta = $('#montoTarjeta').val()
        let porcent =$(this).val()
        let quotas = $('select[id="quotas"] option:selected').text()       
        console.log(quotas.length)
        let valor = 1 + (quotas * porcent)
        let priceTotal = valor * montoTarjeta
       
            if (quotas == '1') {
                $('#montoTarjetaCuotas').val(Math.round(montoTarjeta))    
            }else{
                $('#montoTarjetaCuotas').val(Math.round(priceTotal))   
            }
           
        $('#amountQuota').val(Math.round($('#montoTarjetaCuotas').val() / quotas))    
        console.log(valor)
        console.log(priceTotal)
    })

    $('#montoEfectivo').change(function (){
        let montoTarjeta = montoTotal - $('#montoEfectivo').val()
        $('#montoTarjeta').val(montoTarjeta)
        
        //let montoTarjeta = $('#montoTarjeta').val()
        let porcent =$('#quotas').val()
        let quotas = $('select[id="quotas"] option:selected').text()       
        //console.log(quotas.length)
        let valor = 1 + (quotas * porcent)
        let priceTotal = valor * montoTarjeta
       
            if (quotas == '1') {
                $('#montoTarjetaCuotas').val(Math.round(montoTarjeta))    
            }else{
                $('#montoTarjetaCuotas').val(Math.round(priceTotal))   
            }
           
        $('#amountQuota').val(Math.round($('#montoTarjetaCuotas').val() / quotas)) 
    })

    $('#montoTarjeta').change(function (){
        montoEfectivo = montoTotal - $('#montoTarjeta').val()
        $('#montoEfectivo').val(montoEfectivo)  

        let montoTarjeta = $(this).val()
        let porcent =$('#quotas').val()
        let quotas = $('select[id="quotas"] option:selected').text()       
        //console.log(quotas.length)
        let valor = 1 + (quotas * porcent)
        let priceTotal = valor * montoTarjeta
       
            if (quotas == '1') {
                $('#montoTarjetaCuotas').val(Math.round(montoTarjeta))    
            }else{
                $('#montoTarjetaCuotas').val(Math.round(priceTotal))   
            }
           
        $('#amountQuota').val(Math.round($('#montoTarjetaCuotas').val() / quotas)) 
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
                $('#rowTypePayment').empty();
                $('#saleDetail').empty();
                                                
            }
        });
    })   
});
