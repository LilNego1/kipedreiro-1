<?php

include_once 'backend/model/contato.php';
include_once 'backend/database/database.php';
$nome = $_POST["nome"] ?? '';
$email = $_POST["email"] ?? '';
$assunto = $_POST["assunto"] ?? '';

$ok = RegistraContato($db, $nome, $email, $assunto);
if($ok >0 || $ok === true){
    echo "Contato enviado com sucesso!";
}else{
    echo "Erro ao enviar contato!";
}
