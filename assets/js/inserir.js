$(document).ready(function () {
    // Variável global para armazenar o valor original do e-mail
    let emailOriginal = $("#email-modal").val();
    // console.log(emailOriginal);

    $("#form-perfil").submit(function (event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "../../../administrativo/painel/AJAX/editar-perfil.php",
            type: 'POST',
            data: formData,
            success: function (mensagem) {
                $('#mensagem-perfil').removeClass();
                if (mensagem.trim() == "Salvo com Sucesso") {
                    $('#btn-fechar-perfil').click();
                } else {
                    $('#mensagem-perfil').addClass('text-danger');

                    // Restaurar o valor do e-mail original
                    $('#email-modal').val(emailOriginal);
                }
                $('#mensagem-perfil').text(mensagem);
                location.reload();
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    });
});
