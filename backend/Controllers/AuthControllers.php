<?php
namespace App\Backend\Controllers\Admin;
use App\Backend\Model\Usuario;
use App\Backend\Database\Database;
use App\Backend\Core\View;
use App\backend\Core\Redirect;
use App\backend\Validadores\UsuarioValidador;
use App\Backend\Core\FileManager;
use App\backend\Core\Session;
use App\backend\Core\Flash;

class AuthControllers{
    public $usuarioModel;
    public $session;
    public function __construct() {
        $db = Database:: getInstance();
        $this->usuarioModel = new Usuario($db);
        $this->session = new Session(); 
    }
    public function login(): void{
        View::render("auth/login");
    }
    public function register(): void{
        View::render("auth/register");
    }
    public function logout(): void{
        $this->session->destroy();
        Redirect::redirecionarComMensagem('/login', 'success', 'Logout realizado com sucesso!');
    }
    public function autenticar():void {
        $email = $_POST['email'] ?? null;
        $senha = $_POST['senha'] ?? null;
        $usuario = $this->usuarioModel->checarCredenciais($email, $senha);

        if($usuario) {
            session_regenerate_id(true);
            $this->session->set('usuario_id', $usuario['id_usuario']);
            $this->session->set('usuario_nome', $usuario['nome_usuario']);
            $this->session->set('usuario_tipo', $usuario['tipo_usuario']);
            Redirect::redirecionarPara('/admin/dashboard');
        }else {
            Redirect::redirecionarComMensagem('/backend/login', 'error', 'Email ou senha inválidos.');
        }        
}
    public function cadastrarUsuario(): void{
        $erros = UsuarioValidador::validarEntradas($_POST);
        if(!empty($erros)) {
            Redirect::redirecionarComMensagem('/register', 'error', implode("<br>", $erros));
        }
        $nome = $_POST['nome'] ?? null;
        $email = $_POST['email'] ?? null;
        $senha = $_POST['senha'] ?? null;
        $senha_confirmacao = $_POST['senha_confirmacao'] ?? null;
        if($senha !== $senha_confirmacao) {
            Redirect::redirecionarComMensagem('/register', 'error', 'As senhas não coincidem.');
        }
        if(!empty($this->usuarioModel->buscarPorEmail($email))) {
            Redirect::redirecionarComMensagem('/register', 'error', 'Email já está em uso.');
        }
        $novoUsuarioID = $this->usuarioModel->inserirUsuario($nome, $email, $senha, 'usuario','ativo','null' );
        if($novoUsuarioID) {
            Redirect::redirecionarComMensagem('/login', 'success', 'Cadastro realizado com sucesso! Faça login.');
        }else {
           Redirect::redirecionarComMensagem('/register', 'error', 'Erro ao cadastrar usuário. Tente novamente.');
        }
    }
}