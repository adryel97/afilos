//preview da imagem e conexao com a API
$('#imagem').change(function () { 
    const file = $(this)[0].files[0];
    const fileReader = new FileReader()

    fileReader.onloadend = function () {  
        $('#output_image').attr('src', fileReader.result)
    }
   
    fileReader.readAsDataURL(file)
});


$('#produto__editar').submit(function (e) { 
    e.preventDefault();
    var formulario = $(this);
    var form = formulario[0];
    var formData = new FormData(form);
    var url = formulario.attr('action');

    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function ()
        {
            $('.salvar__btn').addClass('disabled');
            $('.salvar__btn').html('<i class="fas fa-circle-notch fa-spin"></i> Criando Produto...')
        },
        success: function (data)
        {
            $('.salvar__btn').removeClass('disabled');
            $('.salvar__btn').html('Salvar')

            Swal.fire({
                icon: 'success',
                title: 'Produto editado com sucesso'
            })
        }
    });
});