<?php 

namespace App\Model;


use CoffeeCode\DataLayer\DataLayer;
use CoffeeCode\DataLayer\Connect;
use App\Model\FotoProdutoModel;


class ProdutoModel extends DataLayer
{
     /**
     * ProdutoModel constructor.
     */
    public function __construct()
    {
        //string "TABLE_NAME", array ["REQUIRED_FIELD_1", "REQUIRED_FIELD_2"], string "PRIMARY_KEY", bool "TIMESTAMPS"
        parent::__construct("tbl_produto", ["nome_produto", "modelo_produto"], "id_produto", true);
    }    

    /**
     * @param mixed $nome 
     * @param mixed $valor
     * @param mixed $modelo
     * @param mixed $marc
     * @param mixed $descrica
     * @param mixed $nomeFot
     * @return void
     */
    public function insertProduto($nome, $valor, $modelo, $marca, $descricao, $nomeFoto)
    {
        $sql = "INSERT INTO tbl_produto (nome_produto, valor_produto, modelo_produto, marca_produto, descricao_produto) VALUES (?, ?, ?, ?, ?)";
        $conect = Connect::getInstance();
        $con = $conect->prepare($sql);
        $con->bindParam(1, $nome);
        $con->bindParam(2, $valor);
        $con->bindParam(3, $modelo);
        $con->bindParam(4, $marca);
        $con->bindParam(5, $descricao);
        $con->execute();

        $fkProduto = $conect->lastInsertId();
        $fotoProduto = new FotoProdutoModel();
        $fotoProduto->insertImagem($nomeFoto, $fkProduto);
    }
}