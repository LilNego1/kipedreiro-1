<?php
namespace App\Backend;
use App\Backend\Rotas\Rotas;

require __DIR__ .'/../vendor/autoload.php';


$rotas = Rotas::get();
    
$metodoHttp = $_SERVER["REQUEST_METHOD"];
$rota = $_SERVER['REQUEST_URI'];

$partes = explode("@", $rotas[ $metodoHttp ][$rota]);
$nomeController = $partes[0];
$metodoController = $partes[1];
$nomecompletoController = "App\\Backend\\Controllers\\". $nomeController;
$controller = new $nomecompletoController();
$controller->$metodoController();










// var_dump($rotas[ $metodoHttp ][$rota]); 
// use App\Backend\Controllers\UsuarioController;
// $metodo
// // var_dump($_SERVER['REQUEST_URI']);
// // echo "\n\n\n\n";
// // var_dump($_REQUEST["REQUEST_METHOD"]);
// // exit;
// if(($_SERVER['REQUEST_URI']) =="/backend/buscaUsuarios" && $_SERVER["REQUEST_METHOD"] == "GET")
// {
//     $controller = new UsuarioController();
//     $resultado = $controller->index();
//     var_dump($resultado);
// }else{
//     echo "rota n encontrada";
