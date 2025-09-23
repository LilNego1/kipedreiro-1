<?php
include_once __DIR__.'/Database/database.php';
include_once __DIR__.'/Model/usuario.php';

$lucas = new Usuario($db);
$resultado = $lucas->buscaUsuarios('João');
// $resultado = $lucas->buscaUsuarioPorEmail();
var_dump($resultado);
