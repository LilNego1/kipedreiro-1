<?php
namespace App\Backend\Controllers;

use App\Backend\Model\Usuario;
use App\Backend\Database\Database;
use App\Backend\Core\View;
use App\Kipedreiro\Core\Redirect;
use App\Kipedreiro\Validadores\UsuarioValidador;

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
        UsuarioValidador::validarEntradas($_POST);
        if(!empty($erros)){
            Redirect::redirecionarComMensagem("usuario/create", "erro", implode("<br>", $erros));
            
        }
         if($this->usuario->inserirUsuario(
            $_POST["nome_usuario"],
            $_POST["email_usuario"],
            $_POST["senha_usuario"],
            $_POST["tipo_usuario"],
            "ativo"
         
         )){
            Redirect::redirecionarComMensagem("usuario/listar", "sucesso", "Usuario cadastrado com sucesso!!");
         }else{
            Redirect::redirecionarComMensagem("usuario/create", "erro", "Erro ao cadastrar usuario, tente novamente!!");
         };
        
        
    }
    public function atualizarUsuarios() {
        echo "atualizar Usuarios";
        
    }public function deletarUsuarios() {
        echo "deletar Usuarios";
        
    }




}