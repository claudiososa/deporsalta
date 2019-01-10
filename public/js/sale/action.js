
$(document).ready(function () {  
    $('[id ^=sale]').on('click', function(){
        alert($(this).attr('id').substr(4));
        let id = $(this).attr('id').substr(4)
        $.ajax({
            type: 'GET',
            url: '/sale/delete/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                // toastr.success('Successfully deleted Post!', 'Success Alert', {timeOut: 5000});
                $('#rowSale' + data['id']).remove();
                // $('.col1').each(function (index) {
                //     $(this).html(index+1);
                // });
            }
        });
    });
});
