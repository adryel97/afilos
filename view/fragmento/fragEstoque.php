<?php
use App\Controller\ConfigFormatos;
?>
<tr class="border-0">
    <td class="border-0"><?=$produto->nome_produto?></td>
    <td class="border-0"><?=$produto->marca_produto?></td>
    <td class="border-0"><?=ConfigFormatos::formataMoedaRetorno($produto->valor_produto)?></td>
    <td class="border-0">
        <button class="btn btn-sm btn-warning">Editar</button>
        <button class="btn btn-sm btn-danger">Excluir</button>
    </td>
</tr>