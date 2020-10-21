function cadastrarProduto(url, formData, inputs, modalCadastro, fileClean)
{
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            if(data == true){
                modalCadastro.modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Produto cadastrado com sucesso'
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Ops preencha os campos corretamente'
                })
            }
        },
        complete: function () {
            inputs.val('');
            fileClean.val('');
        }
    });
}

$('#cadastro__manual').submit(function (e)
{ 
    e.preventDefault();
    var formulario = $(this);
    var form = formulario[0];
    var formData = new FormData(form);
    var url = formulario.attr('action');
    var inputs = $('.form-control');
    var modalCadastro = $('#cadastroManual');
    var fileClean = $('#imagem');
    cadastrarProduto(url, formData, inputs, modalCadastro, fileClean);
});

function preview_image(event) 
{
    var reader = new FileReader();
    reader.onload = function()
    {
      var output = document.getElementById('output_image');
      output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

$('#cancelar').click(function () { 
    var srcClean = $('#output_image');
    var fileClean = $('#imagem');
    var inputsClean = $('.form-control');
    srcClean.attr('src', '');
    fileClean.val('');
    inputsClean.val('');
});
