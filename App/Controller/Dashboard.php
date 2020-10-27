<?php

namespace App\Controller;

use App\Model\ProdutoModel;
use League\Plates\Engine;


class Dashboard
{
    private $view;
    private $produto;

    /**
     * Class constructor.
     */
    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->view->addData(["router" => $router]);

        $this->produto = new ProdutoModel();
        $this->router = $router;
    }

    public function dashboard()
    {
        $produtos = $this->recentesCadastrados();
        $produtosQuant = $this->quantidadeProdutos();
        echo $this->view->render('dashboard', [
            "produtos" => $produtos,
            "quantidade" => $produtosQuant
            ]);
    }

    public function recentesCadastrados()
    {
        $produtosRecentes = $this->produto->find()->limit(2)->order("created_at DESC")->fetch(true);

        return $produtosRecentes;
    }

    public function quantidadeProdutos()
    {
        $produtosCount = $this->produto->find()->count();
        return $produtosCount;
    }
}
