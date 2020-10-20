
<?php  $this->layout("_template", ['title' => 'Estoque']); ?>

<?php 
  $this->start("breadcrumb");
?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb rounded-0 pt-1 pb-1 bg-gray-1">
                <li class="breadcrumb-item active" aria-current="page">estoque</li>
            </ol>
        </nav>
<?php 
  $this->end("breadcrumb");
?>  
<h1>Estoque</h1>
<p class="text-gray-4 mb-2 mt-4"><b>cadastre um novo produto:</b></p>
<div class="d-flex">
    <button class="btn btn-primary text-uppercase">
        <b>cadastro com Manual</b>
    </button>
    <button class="btn btn-outline-secondary  text-uppercase ml-2" data-toggle="modal" data-target="#cadastroManual">
        <b>cadastro manual</b>
    </button>
</div>
<div>
    <table class="table mt-5 rounded">
        <thead class="thead-dark">
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Marca</th>
              <th scope="col">Valor</th>
              <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>R$ 300,00</td>
                <td>
                    <button class="btn btn-sm btn-warning">Editar</button>
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </td>
            </tr>
            <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>R$ 300,00</td>
                <td>
                    <button class="btn btn-sm btn-warning">Editar</button>
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </td>
            </tr>
            <tr>
                <td>Larry</td>
                <td>the Bird</td>
                <td>R$ 300,00</td>
                <td>
                    <button class="btn btn-sm btn-warning">Editar</button>
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="cadastroManual" tabindex="-1" aria-labelledby="cadastroManualLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0 bg-gray-1">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastroManualLabel">Cadastrar novo produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= $router->route("produto.criar")?> " enctype="multipart/form-data">
            <div class="form-group">
              <label>Nome</label>
              <input type="text" class="form-control" placeholder="Nome do produto">
            </div>
            <div class="form-group">
              <label>Marca</label>
              <input type="text" class="form-control" placeholder="Marca do produto">
            </div>
            <div class="form-group">
              <label>Modelo</label>
              <input type="text" class="form-control" placeholder="Modelo do produto">
            </div>
            <div class="form-group">
              <label>Valor</label>
              <input type="text" class="form-control" placeholder="Valor do produto">
              <small class="text-gray-4">Não obrigatório</small>
            </div>
            <div class="form-group">
              <label for="">Descrição</label>
              <textarea class="form-control" rows="3"></textarea>
              <small class="text-gray-4">Não obrigatório</small>
            </div>
            <div class="form-group">
                <label class="btn btn-lg btn-dark w-100 text-uppercase">
                    <b>Selecione a foto</b> <i class="ml-2 fas fa-upload"></i>
                    <input type="file" name="imagem" id="imagem" class="d-none">
                </label>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Salvar</button>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>