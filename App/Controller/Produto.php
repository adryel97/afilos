<?php 

namespace App\Controller;

use App\Model\ProdutoModel;
use League\Plates\Engine;
use App\Controller\UploadProduto;

class Produto 
{
    private $view;
    private $produto;
    private $uploadProduto;
    
    /**
     * Class constructor.
     */
    public function __construct($router)
    {
        $this->view = new Engine('view', 'php');
        $this->produto = new ProdutoModel();
        $this->uploadProduto = new UploadProduto();

        $this->view->addData(["router" => $router]);
        $this->router = $router;
    }

    public function estoque()
    {
        echo $this->view->render('estoque');
    }

    public function criarProduto()
    {
        $nome = "Teste";
        $valor = "200";
        $modelo = "Teste";
        $marca = "Teste"; 
        $descricao = "Teste";
        
        if(!empty($_FILES['imagem'])){
            $caminhoImagem = $this->uploadProduto->uploadImagem($_FILES['imagem']);
            $this->produto->insertProduto($nome, $valor, $modelo, $marca, $descricao, $caminhoImagem);
        }
    }
}