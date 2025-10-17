<?php
namespace App\Backend\Controllers;

use App\Backend\Model\Usuario;
use App\Backend\Database\Database;
use App\Backend\Core\View;
use App\backend\Core\Redirect;
use App\backend\Validadores\UsuarioValidador;
use App\Backend\Core\FileManager;
use App\Backend\Controllers\Admin\AuthenticadedController;
use App\Backend\Controllers\Admin\AdminController;


class UsuarioController extends AuthenticadedController{
    public $usuario;
    public $db;
    public $gerenciarImagem;
    public function __construct() {
        $this->db = Database:: getInstance();
        $this->usuario = new Usuario($this->db);
        $this->gerenciarImagem = new FileManager('upload');
        
    }
        // metodos de sla oq
        // index, registrar, login, logout, atualizar, deletar, chamada de api
    public function index() {
        $resultado = $this->usuario->buscaUsuarios();
        return $resultado;
        // Example method code here
    }

    public function viewListarUsuarios($pagina=1){
        if(empty($pagina) || $pagina <= 0){
            $pagina = 1;
        }
        $totalAtivos = $this->usuario->totalDeUsuariosAtivos();
        $dados = $this->usuario->paginacao($pagina);
        $total = $this->usuario->totalDeUsuarios();
        $totalInativos = $this->usuario->totalDeUsuariosInativos();
       
        View::render("usuario/index",
        [
        "usuarios"=> $dados['data'],
         "total_usuarios"=> $total[0],
         "total_inativos" => $totalInativos[0],
         "total_ativos" => $totalAtivos[0],
         'paginacao' => $dados
        ]
        );
    }
        
    
    public function viewCriarUsuarios() {
        View::render("usuario/create");
        
    }
    public function viewEditarUsuarios($id) {
        $dados = $this->usuario-> buscaUsuariosPorID($id);
        foreach($dados as $usuario){
            $dados = $usuario;
        }
        View::render("usuario/edit", ["id_usuario" => $dados]);
        
    }
    public function viewExcluirUsuarios($id) {
        View::render("usuario/delete", ["id_usuario" => $id]);
        
    }
    public function relatorioUsuario($id, $data1, $data2){
        View::render("usuario/delete",
         ["id" => $id, "data1" =>$data1,"data2" =>$data2]);
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