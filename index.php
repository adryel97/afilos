<?php 
require "vendor/autoload.php"; 

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

$router->namespace("App\Controller");
//rotas aqui

$router->group("estoque");
$router->get('/', 'Produto:estoque', 'produto.estoque');
$router->get('/cadastrar', 'Produto:cadastrarProduto', 'produto.cadastrar');
$router->post('/criar', 'Produto:criarProduto', 'produto.criar');
$router->post('/excluir', 'Produto:excluirProduto', 'produto.excluir');
$router->get('/mostrar/{id}', 'Produto:mostrarProduto', 'produto.mostrar');


//inicializa as rotas
$router->dispatch();

if($router->error()){
    echo "ESSA ROTA NÃO EXISTE AINDA :(";
}