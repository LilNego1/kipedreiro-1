<?php
namespace App\Backend\Controllers\Admin;
use App\Backend\Core\Redirect;
use App\Backend\Core\Session;

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