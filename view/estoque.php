
<?php  $this->layout("_template", ['title' => 'Estoque']); ?>

<?php 
  $this->start("breadcrumb");
?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb rounded-0 pt-1 pb-1 bg-white">
                <li class="breadcrumb-item text-azul-primary active" aria-current="page">estoque</li>
            </ol>
        </nav>
<?php 
  $this->end("breadcrumb");
?>  
<h1>Estoque</h1>
<p class="text-gray-4 mb-2 mt-4"><b>cadastre um novo produto:</b></p>
<div class="d-flex">
    <button class="btn btn-azul-primary text-uppercase">
        <b>cadastro com assitente</b>
    </button>
    <button class="btn btn-outline-secondary  text-uppercase ml-2" data-toggle="modal" data-target="#cadastroManual">
        <b>cadastro manual</b>
    </button>
</div>
<div>
    <table class="table mt-5 rounded">
        <thead class="bg-primary border-0">
            <tr class="border-0">
              <th class="border-0 text-white" scope="col">Nome</th>
              <th class="border-0 text-white" scope="col">Marca</th>
              <th class="border-0 text-white" scope="col">Valor</th>
              <th class="border-0 text-white" scope="col">Ação</th>
            </tr>
        </thead>
        <tbody id="load__tbl">
          <?php 
              if(!empty($produtos)):
                  foreach ($produtos as $produto):
                      $this->insert("fragmento/fragEstoque", ["produto" => $produto] );
                  endforeach;
              endif;
          ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="cadastroManual" tabindex="-1" aria-labelledby="cadastroManualLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastroManualLabel">Cadastrar novo produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
            <div class="mt-2 mb-4">
              <img id="output_image" style="max-width: 100%;"/>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Salvar</button>
                <button type="button" class="btn btn-outline-secondary" id="cancelar" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->start("js"); ?>
  <script src="<?=url()?>/js/appProduto.js"></script>
<?php $this->end() ?>