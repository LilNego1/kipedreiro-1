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
}