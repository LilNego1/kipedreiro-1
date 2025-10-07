<?php

namespace App\Backend\Model;
use PDO;

class Usuario{
    private $id_usuario;
    private $nome_usuario;
    private $email_usuario;
    private $tipo_usuario;
    private $senha_usuario;
    private $status_usuario;
    private $criado_em;
    private $atualizado_em;
    private $excluido_em;
    private $db;
    private $foto_usuario;
    //construtor inicializa a classe e/ou atributos
    public function __construct($db){
        $this->db = $db;
    }

/* Executa uma instrução preparada passando um array de valores */
function buscaUsuarios(){
    
    $sql = 'SELECT nome_usuario, email_usuario FROM tbl_usuario';
    $statment = $this->db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $statment->execute();
    return $resultado = $statment->fetchAll();

}
function buscaUsuarioPorEmail($email){
    $sql = 'SELECT nome_usuario, email_usuario FROM tbl_usuario WHERE email_usuario = :email';
    $statment = $this->db->prepare($sql);
    $statment->bindParam(':email', $email);
    $statment->execute();
    return $resultado = $statment->fetchAll();
}

function RegistraUsuario( $nome, $email, $senha, $tipo_usuario, $status_usuario, $foto_usuario){
    $sql = 'INSERT INTO tbl_usuario (nome_usuario, email_usuario, senha_usuario,foto_usuario, tipo_usuario, status_usuario) 
    VALUES (:nome, :email, :senha , :foto, :tipo, :status)';
    $statment = $this->db->prepare($sql);
    $statment->bindParam(':nome', $nome);
    $statment->bindParam(':email', $email);
    $statment->bindParam(':senha',password_hash( $senha, 'PASSWORD_bCRYPT'));
    $statment->bindParam(':tipo', $tipo_usuario);
    $statment->bindParam(':status', $status_usuario);
    $statment->bindParam(':foto', $foto_usuario);
    if($statment->execute()){
        return $this->db->lastInsertId();
        } else {
            return false;
        }
    }
function atualizarUsuario($id, $nome, $email, $senha = null, $tipo = null, $status = null){
        $sql = "UPDATE tbl_usuario SET nome_usuario = :nome, email_usuario = :email";
        if($senha){
            $sql .= ", senha_usuario = :senha";
        }
        if($tipo){
            $sql .= ", tipo_usuario = :tipo";
        }
        if($status){
            $sql .= ", status_usuario = :status";
        }
        $sql .= ", atualizado_em = NOW() WHERE id_usuario = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        if($senha){
            $stmt->bindParam(':senha', password_hash($senha, PASSWORD_BCRYPT));
        }
        if($tipo){
            $stmt->bindParam(':tipo', $tipo);
        }
        if($status){
            $stmt->bindParam(':status', $status);
        }
        return $stmt->execute();
    }
    function deletarUsuario($id){
        $sql = "UPDATE tbl_usuario SET excluido_em = NOW() WHERE id_usuario = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

function buscaUsuariosPorID($id){
    $sql = 'SELECT * FROM tbl_usuario WHERE id_usuario = :id_usuario';
    $statment = $this->db->prepare($sql);
    $statment->bindParam(':id_usuario', $id);
    return $statment->execute();
    
}
}

// $ok = RegistraUsuario($db, 'João Silva', 'joaosilva@kkkkk.com', '123456');
// echo $ok;
// var_dump($resultado);
    
?>