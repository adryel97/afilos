<?php 
require "vendor/autoload.php"; 


use CoffeeCode\Router\Router;

$router = new Router(ROOT);

$router->namespace("App\Controller");
//rotas aqui

$router->group("");
$router->get('/estoque', 'Produto:estoque', 'produto.estoque');
$router->post('/estoque/teste', 'Produto:criarProduto', 'produto.criar');

//inicializa as rotas
$router->dispatch();

if($router->error()){
    echo "ESSA ROTA NÃO EXISTE AINDA :(";
}