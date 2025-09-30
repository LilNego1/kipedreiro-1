<?php

namespace App\Backend\Core;

class View
{
    public static function render($view, $data = [])
    {
       // var_dump($view); exit;
        extract($data);
        require_once __DIR__ . '/../Views/templates/partials/header.php';
        require_once __DIR__ . "/../Views/templates/{$view}.php";
        require_once __DIR__ . '/../Views/templates/partials/footer.php';
    }
}