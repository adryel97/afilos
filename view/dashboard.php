<?php

use App\Controller\ConfigFormatos;

$this->layout("_template", ['title' => 'Dashboard']);
?>
<?php 
  $this->start("breadcrumb");
?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb rounded-0 pt-1 pb-1 bg-white">
                <li class="breadcrumb-item text-azul-primary active" aria-current="page">dashboard</li>
            </ol>
        </nav>
<?php 
  $this->end("breadcrumb");
?>  
<div class="mb-5">
    <h1>Dashboard</h1>
    <small class="text-gray-4"><b>Bem vindo</b> ao painel administrativo.</small>
</div>
<div class="row row-cols-4">
    <div class="col">
        <div class="card w-100">
        <div class="card-header">
            Recem adicionados
        </div>
            <ul class="list-group border-0">
            <?php 
                if($produtos):
                    foreach ( $produtos as $p):
                ?>
                <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                    <?= $p->nome_produto ?>
                    <span class="badge badge-primary badge-pill"> <?= ConfigFormatos::dataFormato($p->created_at)?>  <?= ConfigFormatos::horaFormato($p->created_at)?></span>
                </li>
                <?php
                    endforeach;
                endif;
                ?>
            </ul>
        </div>
    </div>
    <div class="col">
        <div class="card w-100">
        <div class="card-header">
            Quantidade em estoque
        </div>
            <div class="card-body text-center">
                <h1><?=$quantidade?></h1>
            </div>
        </div>
    </div>
</div>