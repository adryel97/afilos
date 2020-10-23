<?php
use App\Controller\ConfigFormatos;
$this->layout("_template", ['title' => 'Estoque']); ?>
<?php 
  $this->start("breadcrumb");
?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb rounded-0 pt-1 pb-1 bg-white">
                <li class="breadcrumb-item" aria-current="page"><a class="text-gray-4" href="<?= $router->route("produto.estoque")?>">estoque</a></li>
                <li class="breadcrumb-item text-azul-primary active" aria-current="page">editar</li>
            </ol>
        </nav>
<?php 
  $this->end("breadcrumb");
?>  
<h1>Editar</h1>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Tipo</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?= $produto->nome_produto?>" placeholder="Nome do produto">
        </div>
        <div class="form-group">
            <label>Marca</label>
            <input type="text" id="marca" name="marca" class="form-control" value="<?= $produto->marca_produto?>" placeholder="Marca do produto">
        </div>
        <div class="form-group">
            <label>Modelo</label>
            <input type="text" id="modelo" name="modelo" class="form-control" value="<?= $produto->modelo_produto?>" placeholder="Modelo do produto">
        </div>
        <div class="form-group">
            <label>Valor</label>
            <input type="text" id="valor" name="valor" class="form-control" value="<?= ConfigFormatos::formataMoedaRetorno($produto->valor_produto)?>" placeholder="Valor do produto">
            <small class="text-gray-4">Não obrigatório</small>
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <textarea name="descricao" class="form-control" rows="3"><?= $produto->descricao_produto?></textarea>
            <small class="text-gray-4">Não obrigatório</small>
        </div>
        <div class="form-group" data-upload-id="myUniqueUploadId">
            <label class="btn btn-lg btn-dark w-100 text-uppercase">
                <b>Selecione uma foto</b> <i class="ml-2 fas fa-upload"></i>
                <input type="file" name="imagem" id="imagem" class="d-none">
            </label>
        </div>
        <div class="form-group">
                <button class="btn btn-success salvar__btn" type="submit">Salvar</button>
                <a type="button" class="btn btn-secondary" data-dismiss="modal" href="<?=$router->route('produto.estoque')?>"> <i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <img  id="output_image" style="max-width: 100%;" src="<?=url()?>/<?=$foto->nome_foto?>" alt="<?=ConfigFormatos::slugi($produto->nome_produto)?>">
        </div>
    </div>
</div>