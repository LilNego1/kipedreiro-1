<?php


/* Executa uma instrução preparada passando um array de valores */
function BuscaContato($db){
    $sql = 'SELECT nome_contato, email_contato FROM tbl_usuario';
    $statment = $db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $statment->execute();
    return $resultado = $statment->fetchAll();

}
function RegistraContato($db, $nome, $email, $assunto){
    $sql = 'INSERT INTO tbl_contato (nome_contato, email_contato, assunto_contato) 
    VALUES (:nome, :email, :assunto)';
    $statment = $db->prepare($sql);
    $statment->bindParam(':nome', $nome);
    $statment->bindParam(':email', $email);
    $statment->bindParam(':assunto', $assunto);
    return $statment->execute();
    
}

// function BuscaUsuariosPorID($db,$id){
//     $sql = 'SELECT nome_usuario, email_usuario FROM tbl_usuario WHERE id_usuario = :id';
//     $statment = $db->prepare($sql);
//     $statment->bindParam(':id', $id);
//     return $statment->execute();
    
// }