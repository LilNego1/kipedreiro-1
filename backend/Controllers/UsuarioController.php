<?php
namespace App\Backend\Controllers;

use App\Backend\Model\Usuario;
use App\Backend\Database\Database;

class UsuarioController {
    public $usuario;
    public $db;
    public function __construct() {
        $this->db = Database:: getInstance();
        $this->usuario = new Usuario($this->db);
        
    }
        // metodos de sla oq
        // index, registrar, login, logout, atualizar, deletar, chamada de api
    public function index() {
        $resultado = $this->usuario->buscaUsuarios();
        return $resultado;
        // Example method code here
    }

    public function viewListarUsuarios() {
        echo "listar Usuarios";
        
    }
    public function viewCriarUsuarios() {
        echo "Criar Usuarios";
        
    }
    public function viewEditarUsuarios() {
        echo "Editar Usuarios";
        
    }
    public function viewExcluirUsuarios() {
        echo "Excluir Usuarios";
        
    }
    public function salvarUsuarios() {
        echo "Salvar Usuarios";
        
    }
    public function atualizarUsuarios() {
        echo "atualizar Usuarios";
        
    }public function deletarUsuarios() {
        echo "deletar Usuarios";
        
    }




}