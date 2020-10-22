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
        <form id="cadastro__manual" method="post" action="<?= $router->route("produto.criar")?> " enctype="multipart/form-data">
                <div class="form-group">
                <label>Nome</label>
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
                <div class="form-group" data-upload-id="myUniqueUploadId">
                    <label class="btn btn-lg btn-dark w-100 text-uppercase">
                        <b>Selecione uma foto</b> <i class="ml-2 fas fa-upload"></i>
                        <input type="file" name="imagem" id="imagem" class="d-none" onchange="previewImagem(event)">
                    </label>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Salvar</button>
                    <button type="button" class="btn btn-outline-secondary" id="cancelar" data-dismiss="modal">Cancelar</button>
                </div>
        </form>
    </div>
    <div class="col-md-6">
        <img id="output_image" style="width: 100%"/>
    </div>
</div>
<?php $this->start("js"); ?>
  <script src="<?=url()?>/js/appProduto.js"></script>
<?php $this->end() ?>