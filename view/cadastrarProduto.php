<?php  $this->layout("_template", ['title' => 'Cadastrar']); ?>
<?php 
  $this->start("breadcrumb");
?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb rounded-0 pt-1 pb-1 bg-white">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="<?= $router->route("produto.estoque")?>" class="text-gray-4">estoque</a>
                </li>
                <li class="breadcrumb-item text-azul-primary active" aria-current="page">cadastrar</li>
            </ol>
        </nav>
<?php 
  $this->end("breadcrumb");
?>  
<div class="row">
    <div class="col-md-6">
    <h1>Cadastrar Produto</h1>
    <div id="smartwizard">

    <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="#step-1">
            Cadastrar foto
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#step-2">
            Sugestão
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#step-3">
            Informações do produto
          </a>
        </li>
    </ul>

    <form id="cadastro" class="tab-content" method="post" action="<?= $router->route("produto.criar")?> " enctype="multipart/form-data">
        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                <div class="form-group" data-upload-id="myUniqueUploadId">
                    <label class="btn btn-lg btn-dark w-100 text-uppercase">
                        <b>Selecione uma foto</b> <i class="ml-2 fas fa-upload"></i>
                        <input type="file" name="imagem" id="imagem" class="d-none">
                    </label>
                </div>
                <div class="col-md-6">
                    <img id="output_image" style="width: 100%"/>
                </div>
        </div>
        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
        <p>
            <small class="text-gray-4">Não é obrigatório selecionar, caso seja manual clique em próximo</small>
        </p>
        <ul class="list-group">
            <li class="list-group-item" >
                Tipo do produto
                <div id="tipo_list">
                    
                </div>
            </li>
            <li class="list-group-item" >
                Marca
                <div id="marca_list">

                </div>
            </li>
            <li class="list-group-item">
                Modelo
                <div id="modelo_list">

                </div>
            </li>
        </ul>
        </div>
        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
            <div class="form-group">
                <label>Tipo</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do produto">
            </div>
            <div class="form-group">
                <label>Marca</label>
                <input type="text" id="marca" name="marca" class="form-control" placeholder="Marca do produto">
            </div>
            <div class="form-group">
                <label>Modelo</label>
                <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Modelo do produto">
            </div>
            <div class="form-group">
                <label>Valor</label>
                <input type="text" id="valor" name="valor" class="form-control" placeholder="Valor do produto">
                <small class="text-gray-4">Não obrigatório</small>
            </div>
            <div class="form-group">
                <label for="">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3"></textarea>
                <small class="text-gray-4">Não obrigatório</small>
            </div>
            <div class="form-group">
                    <button class="btn btn-success salvar__btn" type="submit">Salvar</button>
                    <button type="button" class="btn btn-outline-secondary" id="cancelar" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </form>
</div>
</div>
<?php $this->start("js"); ?>
  <script src="<?=url()?>/js/appProduto.js"></script>
<?php $this->end() ?>