<?php
namespace App\Backend;
require __DIR__ .'/../vendor/autoload.php';
 if (!isset($_SESSION)) {
            session_start();
        }
use Bramus\Router\Router;
$router = new Router();
$router->setNamespace('\App\Backend\Controllers');
use App\Backend\Rotas\Rotas;
$rotas = Rotas::get();

foreach ($rotas as $metodohttp => $rota){
    foreach ($rota as $uri => $acao){
        $metodoBramus = strtolower($metodohttp);
        $router->{$metodoBramus}($uri, $acao); //prestar att aqui
    }

}
    $router ->set404(function() {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo 'Página não encontrada';
    });
    $router->run();
