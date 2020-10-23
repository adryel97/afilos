<?php
use App\Controller\ConfigFormatos;
?>
<tr class="border-0" id="linha-produto-<?=$produto->id_produto?>">
    <td class="border-0"><?=$produto->nome_produto?></td>
    <td class="border-0"><?=$produto->marca_produto?></td>
    <td class="border-0"><?=ConfigFormatos::formataMoedaRetorno($produto->valor_produto)?></td>
    <td class="border-0">
        <a class="btn btn-sm btn-warning" 
            data-editar="<?=$produto->id_produto?>" 
            href="<?=$router->route("produto.mostrar", ["id" => $produto->id_produto])?>">
            <i class="fas fa-edit"></i> Editar
        </a>
        <button class="btn btn-sm btn-danger excluir"  
        data-url="<?= $router->route("produto.excluir") ?>"  
        data-toggle="modal" data-target="#excluirProdutoModal" 
        data-produto="<?=$produto->nome_produto?>"
        data-excluir="<?=$produto->id_produto?>">

        <i class="far fa-trash-alt"></i> 
            Excluir
        </button>
    </td>
</tr>