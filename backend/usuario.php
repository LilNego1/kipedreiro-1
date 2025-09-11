<?php

/* Executa uma instrução preparada passando um array de valores */
function BuscaUsuarios($db){
    
    $sql = 'SELECT nome_usuario, email_usuario FROM tbl_usuario';
    $statment = $db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $statment->execute();
    $resultado = $statment->fetchAll();
    return $resultado = $statment->fetchAll();

}
function RegistraUsuario($db, $nome, $email, $senha){
    $sql = 'INSERT INTO tbl_usuario (nome_usuario, email_usuario, senha_usuario) 
    VALUES (:nome, :email, :senha)';
    $statment = $db->prepare($sql);
    $statment->bindParam(':nome', $nome);
    $statment->bindParam(':email', $email);
    $statment->bindParam(':senha', $senha);
    return $statment->execute();
    
}

// $ok = RegistraUsuario($db, 'João Silva', 'joaosilva@kkkkk.com', '123456');
// echo $ok;
// var_dump($resultado);