<?php
namespace App\Backend;

require __DIR__ .'/../vendor/autoload.php';

// use App\Backend\Controllers\UsuarioController;
// var_dump($_SERVER['REQUEST_URI']);
// echo "\n\n\n\n";
// var_dump($_REQUEST["REQUEST_METHOD"]);
// exit;
if(($_SERVER['REQUEST_URI']) =="/backend/buscaUsuarios" && $_SERVER["REQUEST_METHOD"] == "GET")
{
    $controller = new UsuarioController();
    $resultado = $controller->index();
    var_dump($resultado);
}else{
    echo "rota n encontrada";
}


