<?php 

namespace App\Controller;


use App\Model\ProdutoModel;
use League\Plates\Engine;
use App\Controller\UploadProduto;
use App\Model\FotoProdutoModel;


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
        $this->foto = new FotoProdutoModel();
       
        $this->router = $router;
    }

    /**
     * @return view
     */
    public function estoque()
    {
        $produtos = $this->produto->find()->fetch(true);
        echo $this->view->render('estoque', [
            "produtos" => $produtos
        ]);
    }

    /**
     * @return view
     */
    public function cadastrarProduto()
    {
        echo $this->view->render('cadastrarProduto');
    }

    /**
     * @return void
     */
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

    /**
     * @param array $data
     * @return void
     */
    public function excluirProduto(array $data): void
    {
        $produto = $this->produto;
        $id = filter_var($data['id'], FILTER_VALIDATE_INT);

        if($produto){
            $produto->findById($id)->destroy();
        }
        echo json_encode($id);
    }

    /**
     * @param array $id
     * @return view
     */
    public function mostrarProduto(array $id)
    {
        $idProduto = filter_var($id['id'], FILTER_VALIDATE_INT);

        $foto = $this->foto->findById($idProduto);
        $produto = $this->produto->findById($idProduto);

        echo $this->view->render('editarProduto', [
            "produto" => $produto,
            "foto" => $foto
        ]);
    }

    /**
     * @return void
     */
    public function editarProduto(): void
    {
        $nome      = $_POST['nome'];
        $valor     = $_POST['valor'];
        $marca     = $_POST['marca'];
        $modelo    = $_POST['modelo'];
        $descricao = $_POST['descricao'];

        $idProduto = $_POST['id'];

        $files = $_FILES;
        
        if(!empty($files['imagem'])){
            $file = $files['imagem'];
            if(empty($file['type'])){
                $produto = $this->produto->findById($idProduto);
                $produto->nome_produto = $nome;
                $produto->valor_produto = ConfigFormatos::formataMoeda($valor);
                $produto->modelo_produto = $modelo;
                $produto->marca_produto = $marca;
                $produto->descricao_produto = $descricao;

                $produto->save;

                echo 0;
            } else{
                $produto = $this->produto->findById($idProduto);
                $produto->nome_produto = $nome;
                $produto->valor_produto = ConfigFormatos::formataMoeda($valor);
                $produto->modelo_produto = $modelo;
                $produto->marca_produto = $marca;
                $produto->descricao_produto = $descricao;

                $produto->save;

                
                $caminhoImagem = $this->uploadProduto->uploadImagem($file);
                $foto = $this->foto->findById($idProduto);
                $foto->nome_foto = $caminhoImagem;

                $foto->save;

                echo 1;
            }
        }    
    }
}