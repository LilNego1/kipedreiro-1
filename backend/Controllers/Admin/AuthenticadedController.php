<?php
namespace App\Backend\Controllers\Admin;
use App\backend\Core\Redirect;
use App\backend\Core\Session;

abstract class AuthenticadedController{
    protected Session $session;
    public function __construct() {
        $this->session = new Session();
        if(!$this->session->get('usuario_id')){
            Redirect::redirecionarComMensagem(
                'login','error','Você precisa estar logado para acessar essa área.');
        }
    }
}