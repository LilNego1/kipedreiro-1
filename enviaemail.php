<?php
include_once 'backend/usuario.php';
include_once 'backend/model/database.php';
$nome = $_POST["nome"] ?? '';
$email = $_POST["email"] ?? '';
$senha = $_POST["senha"] ?? '';

$ok = RegistraUsuario($db, $nome, $email, $senha);
if($ok >0 || $ok === true){
    echo "Usuário cadastrado com sucesso!";
}else{
    echo "Erro ao cadastrar usuário!";
}
