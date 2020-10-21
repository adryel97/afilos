//cadastra o produto
function cadastrarProduto(url, formData, inputs, modalCadastro, fileClean)
{
    var srcClean = $('#output_image');
    var fileClean = $('#imagem');
    var tbl = $('#load__tbl'); 

    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function (callback) {

            var datProduto = JSON.parse(callback);
            if (datProduto.produto) {
                tbl.prepend(datProduto.produto);
            }

            if(callback == 0){
                Swal.fire({
                    icon: 'error',
                    title: '<h3>Ops! <span class="text-danger ml-3"> :( <span><h3>',
                    html: '<p class="mb-1">Preencha os campos corretamente.</p> <p>Verifique se a imagem é formato <b>PNG, JPG, GIF, JPEG<b><p>'
                })
            } else {
                modalCadastro.modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Produto cadastrado com sucesso'
                })
                srcClean.attr('src', '');
                fileClean.val('');
            }
        },
        complete: function () {
            inputs.val('');
            fileClean.val('');
        }
    });
}

//ao clicar no cadastro manual
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


//preview da imagem
function previewImagem(event) 
{
    var reader = new FileReader();
    reader.onload = function()
    {
      var output = document.getElementById('output_image');
      output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

//ao clicar em cancelar limpa todoas as informações
$('#cancelar').click(function ()
{ 
    var srcClean = $('#output_image');
    var fileClean = $('#imagem');
    var inputsClean = $('.form-control');
    srcClean.attr('src', '');
    fileClean.val('');
    inputsClean.val('');
});