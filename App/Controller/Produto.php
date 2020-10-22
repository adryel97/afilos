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
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->view->addData(["router" => $router]);

        $this->produto = new ProdutoModel();
        $this->uploadProduto = new UploadProduto();
       
        $this->router = $router;
    }

    public function estoque()
    {
        $produtos = $this->produto->find()->fetch(true);
        echo $this->view->render('estoque', [
            "produtos" => $produtos
        ]);
    }

    public function cadastrarProduto()
    {
        echo $this->view->render('cadastrarProduto');
    }

    public function criarProduto()
    {
        $nome      = $_POST['nome'];
        $valor     = $_POST['valor'];
        $marca     = $_POST['marca'];
        $modelo    = $_POST['modelo'];
        $descricao = $_POST['descricao'];

        $files = $_FILES;
        
        if(!empty($files['imagem'])){
            $file = $files['imagem'];
            if(empty($file['type'])){
                echo 0;
            } else{
                $caminhoImagem = $this->uploadProduto->uploadImagem($file);
                $this->produto->insertProduto($nome, ConfigFormatos::formataMoeda($valor), $modelo, $marca, $descricao, $caminhoImagem);
                echo 1;
            }
        }
    }
}