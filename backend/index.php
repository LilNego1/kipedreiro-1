<?php
namespace App\Kipedreiro;
require __DIR__ .'/../vendor/autoload.php';

use Bramus\Router\Router;
$router = new Router();
$router-> setNamespace('\App\Kipedreiro\Controllers');
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
