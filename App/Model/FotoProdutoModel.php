<?php 
namespace App\Model;


use CoffeeCode\DataLayer\Connect;
use CoffeeCode\DataLayer\DataLayer;
use PDO;


class FotoProdutoModel extends DataLayer
{
    /**
     * FotoProdutoModel constructor.
     */
    public function __construct()
    {
        //string "TABLE_NAME", array ["REQUIRED_FIELD_1", "REQUIRED_FIELD_2"], string "PRIMARY_KEY", bool "TIMESTAMPS"
        parent::__construct("tbl_foto_produto", ["nome_foto"], "id_foto", false);
    } 

    /**
     * @param mixed $nomeFoto 
     * @param mixed $fkProduto
     * @return void
     */
    public function insertImagem($nomeFoto, $fkProduto)
    {
        $sql = "INSERT INTO tbl_foto_produto (nome_foto, fk_produto) VALUES (?, ?)";

        $conect = Connect::getInstance();
        $con = $conect->prepare($sql);
        $con->bindValue(1, $nomeFoto);
        $con->bindValue(2, $fkProduto);
        $con->execute();
    }

}
