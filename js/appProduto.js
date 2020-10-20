function cadastrarProduto(url, formData, inputs, modalCadastro)
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
            } else {
                
            }
        },
        complete: function () {
            inputs.val('');
            
        }
    });
}

$('#cadastro__manual').submit(function (e) { 
    e.preventDefault();
    var formulario = $(this);
    var form = formulario[0];
    var formData = new FormData(form);
    var url = formulario.attr('action');
    var inputs = $('.form-control');
    var modalCadastro = $('#cadastroManual');
    cadastrarProduto(url, formData, inputs, modalCadastro);
});