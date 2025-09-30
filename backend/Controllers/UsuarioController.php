<?php
namespace App\Backend\Controllers;

use App\Backend\Model\Usuario;
use App\Backend\Database\Database;
use App\Backend\Core\View;

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
        $dados = $this->usuario->buscaUsuarios();
        View::render("usuario/index", ["usuarios" => $dados]);
        
    }
    public function viewCriarUsuarios() {
        View::render("usuario/create");
        
    }
    public function viewEditarUsuarios() {
        View::render("usuario/edit");
        
    }
    public function viewExcluirUsuarios() {
        View::render("usuario/delete");
        
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