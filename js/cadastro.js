$(document).ready(function() {
    $('#product-form').on('submit', function(event) {
        event.preventDefault(); 

        $.ajax({
            type: 'POST',
            url: $(this).attr('cadastrar-produto.php'), 
            data: $(this).serialize(), 
            dataType: 'json',
            success: function(response) {
                var messageDiv = $('#response-message');
                if (response.status === 'success') {
                    messageDiv.html(`<p>${response.message}</p>`);
                    $('#product-form')[0].reset();
                } else {
                    messageDiv.html(`<p style="color: red;">${response.message}</p>`);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#response-message').html('<p style="color: red;">Ocorreu um erro: ' + textStatus + '</p>');
            }
        });
    });
});
