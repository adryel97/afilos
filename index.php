<?php 
require "vendor/autoload.php"; 

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

$router->namespace("App\Controller");
//rotas aqui

//rotas de estoque
$router->group('estoque');
$router->get('/', 'Produto:estoque', 'produto.estoque');
$router->get('/mostrar/{id}', 'Produto:mostrarProduto', 'produto.mostrar');
$router->get('/cadastrar', 'Produto:cadastrarProduto', 'produto.cadastrar');
$router->post('/criar', 'Produto:criarProduto', 'produto.criar');
$router->post('/editar', 'Produto:editarProduto', 'produto.editar');
$router->post('/excluir', 'Produto:excluirProduto', 'produto.excluir');

$router->group('dashboard');
$router->get('/', 'Dashboard:dashboard', 'dasboard.dashboard');
$router->get('/recentes', 'Dashboard:recentesCadastrados', 'dasboard.recentesCadastrados');

//inicializa as rotas
$router->dispatch();

if($router->error()){
    echo "ESSA ROTA NÃO EXISTE AINDA :( " . $router->error(); 
}