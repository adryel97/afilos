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
        
    }
}