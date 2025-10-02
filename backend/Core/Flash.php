<?php
namespace App\Kipedreiro\Core;
class flash
{
    public static function set($tipo, $mensagem)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['flash'] = [
            'tipo' => $tipo,
            'mensagem' => $mensagem
        ];
    }

    public static function get()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $flash;
        }
        return null;
    }
}