$(document).ready(function () {
    $('#smartwizard').smartWizard({
        selected: 0, 
        theme: 'dots',
        autoAdjustHeight : false , // Ajustar automaticamente a altura do conteúdo  
        cycleSteps : false , // Permite percorrer a navegação das etapas  
        backButtonSupport : true , // Habilita o suporte do botão Voltar  
        enableURLhash: true, // Habilita a seleção da etapa com base no hash de url  
        enableAnchorOnDoneStep : false, // Habilita/desabilita a navegação das etapas concluídas
        lang: { // Language variables for button
            next: 'Próximo',
            previous: 'Voltar'
        }
    });

    $('#tbl_produto').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"
        },
        "bFilter": true,
        "filter": true,
        "ordering": false,
        "displayStart": 20,
        "lengthChange": false,
        "dom": '<lf<t>ip>'
    });
});

//cadastra o produto
function cadastrarProduto(url, formData, inputs, fileClean)
{
    var srcClean = $('#output_image');
    var fileClean = $('#imagem');

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
        success: function (callback)
        {
            $('.salvar__btn').removeClass('disabled');
            $('.salvar__btn').html('Salvar')

            if(callback == 0){
                Swal.fire({
                    icon: 'error',
                    title: '<h3>Ops! <span class="text-danger ml-3"> :( <span><h3>',
                    html: '<p class="mb-1">Preencha os campos corretamente.</p> <p>Verifique se a imagem é formato <b>PNG, JPG, GIF, JPEG<b><p>'
                })
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Produto cadastrado com sucesso'
                })
                srcClean.attr('src', '');
                fileClean.val('');
                inputs.val('');
            }
        }
    });
}
//excluir produto
function excluirProduto(url, id)
{
    $.ajax({
        type: "POST",
        url: url,
        data: {"id": id},
        dataType: "json",
        beforeSend: function ()
        {
            $('.excluir__produto--btn').addClass('disabled')
            $('.excluir__produto--btn').html('<i class="fas fa-circle-notch fa-spin"></i> Excluindo...')
        },
        success: function (data)
        {
            $('#linha-produto-' + id).fadeOut();
            $('#excluirProdutoModal').modal('hide');
        },
        complete: function ()
        {
            $('.excluir__produto--btn').html('Excluir')
            $('.excluir__produto--btn').removeClass('disabled')
            Swal.fire({
                icon: 'success',
                title: 'Produto excluido com sucesso'
            })
        }
    });
}

//envia as informações para o cadastro
$('#cadastro').submit(function (e)
{ 
    e.preventDefault();
    var formulario = $(this);
    var form = formulario[0];
    var formData = new FormData(form);
    var url = formulario.attr('action');
    var inputs = $('.form-control');
    var fileClean = $('#imagem');
    cadastrarProduto(url, formData, inputs, fileClean);
});

$(".excluir").click(function () { 
    var id = $(this).attr('data-excluir');
    var url = $(this).attr('data-url');
    var produtoNome = $(this).attr('data-produto');
    
    $('#excluirProdutoLabel').html(produtoNome);
    $('.modal-body').html(`Você realmente deseja excluir esse produto: <b>${produtoNome}</b>`)

    $('#excluirProduto').click(function () { 
        excluirProduto(url, id);
    });
});



makeblob = function (dataURL) {
    var BASE64_MARKER = ';base64,';
    if (dataURL.indexOf(BASE64_MARKER) == -1) {
        var parts = dataURL.split(',');
        var contentType = parts[0].split(':')[1];
        var raw = decodeURIComponent(parts[1]);
        return new Blob([raw], { type: contentType });
    }
    var parts = dataURL.split(BASE64_MARKER);
    var contentType = parts[0].split(':')[1];
    var raw = window.atob(parts[1]);
    var rawLength = raw.length;

    var uInt8Array = new Uint8Array(rawLength);

    for (var i = 0; i < rawLength; ++i) {
        uInt8Array[i] = raw.charCodeAt(i);
    }

    return new Blob([uInt8Array], { type: contentType });
}

//preview da imagem e conexao com a API
$('#imagem').change(function () { 
    const file = $(this)[0].files[0];
    const fileReader = new FileReader()

    fileReader.onloadend = function () {  
        $('#output_image').attr('src', fileReader.result)
        var endpoint = "https://appafilos.cognitiveservices.azure.com/";
        var uriBase = endpoint + "vision/v3.1/analyze";
    
        $.ajax({
            headers: {
                "ocp-apim-subscription-key": "6fc56ac80c15406eaf88e6b42c503ee5",
                "Content-Type": "application/octet-stream"
            },
            type: "POST",
            url: uriBase+"/?visualFeatures=Description,Tags&subscription-key=6fc56ac80c15406eaf88e6b42c503ee5&language=pt",
            processData: false,
            contentType: 'application/octet-stream',
            data: makeblob(fileReader.result),
            success: function (data)
            {
                $('#tipo_list').html(`
                <div class="form-group mt-2">
                    <select class="form-control" id="select_tipo">
                        <option>Selecione o tipo</option>
                    </select>
                </div>
                `)
                $('#marca_list').html(`
                <div class="form-group mt-2">
                    <select class="form-control" id="select_marca">
                        <option>Selecione a marca</option>
                    </select>
                </div>
                `)
                $('#modelo_list').html(`
                <div class="form-group mt-2">
                    <select class="form-control" id="select_modelo">
                        <option>Selecione o modelo</option>
                    </select>
                </div>
                `)
                for (var i in data.description.tags) {
                    var descricao = data.description.tags[i];
                    $('#select_tipo').append(`
                        <option value="${descricao}">${descricao}</option>
                    `)
                    $('#select_marca').append(`
                        <option value="${descricao}">${descricao}</option>
                    `)
                    $('#select_modelo').append(`
                        <option value="${descricao}">${descricao}</option>
                    `)
                }

                $('#select_marca').change(function () { 
                    const marcaVal = $(this).val();
                    $('#marca').val(marcaVal);
                });

                $('#select_tipo').change(function () { 
                    const tipoVal = $(this).val();
                    $('#nome').val(tipoVal);
                });

                $('#select_modelo').change(function () { 
                    const modeloVal = $(this).val();
                    $('#modelo').val(modeloVal);
                });

                $('#cancelar').click(function () { 
                    $('#modelo_list div').empty();
                    $('#marca_list div').empty();
                    $('#tipo_list div').empty();
                });
            }
        });
    }
   
    fileReader.readAsDataURL(file)
});

//ao clicar em cancelar limpa todas as informações
$('#cancelar').click(function ()
{ 
    var srcClean = $('#output_image');
    var fileClean = $('#imagem');
    var inputsClean = $('.form-control');
    srcClean.attr('src', '');
    fileClean.val('');
    inputsClean.val('');
    
});


//tabela para buscar o produto