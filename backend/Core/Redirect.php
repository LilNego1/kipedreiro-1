<?php
namespace App\Backend\Core;
use App\Backend\Core\Flash;
class Redirect
{
    public static function redirecionarPara($url){
        header("Location: /backend/" .$url);
        exit;
    }
    public static function redirecionarComMensagem($url, $tipo, $mensagem){
        Flash::set($tipo, $mensagem);
        self::redirecionarPara($url);
    }
    public static function voltarPaginaAnteriorComMensagem($tipo, $mensagem){
        $url = $_SERVER['HTTP_REFERER'] ?? '/';
        self::redirecionarPara($url, $tipo, $mensagem);
    }

}