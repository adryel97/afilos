$(document).ready(function () {
    $('#smartwizard').smartWizard({
        selected: 0, // Initial selected step, 0 = first step
        theme: 'dots',
        autoAdjustHeight : false , // Ajustar automaticamente a altura do conteúdo  
        cycleSteps : false , // Permite percorrer a navegação das etapas  
        backButtonSupport : true , // Habilita o suporte do botão Voltar  
        enableURLhash: true, // Habilita a seleção da etapa com base no hash de url  
        enableAnchorOnDoneStep : true, // Habilita / desabilita a navegação das etapas concluídas
        lang: { // Language variables for button
            next: 'Próximo',
            previous: 'Voltar'
        },
        transition: {
            animation: 'fade', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
            speed: '400', // Transion animation speed
            easing:'' // Transition animation easing. Not supported without a jQuery easing plugin
        }
    });
});
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

//preview da imagem
$('#imagem').change(function () { 
    const file = $(this)[0].files[0];
    const fileReader = new FileReader()

    fileReader.onloadend = function () {  
        $('#output_image').attr('src', fileReader.result)
        //console.log(fileReader.result);

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
            success:function(data) {
                console.log(data)
            }
        });
    }
   
    fileReader.readAsDataURL(file)
});

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


//tabela para buscar o produto