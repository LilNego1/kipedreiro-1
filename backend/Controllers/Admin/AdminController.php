<?php
namespace App\Backend\Controllers\Admin;
use App\backend\Core\Redirect;

abstract class AdminController extends AuthenticadedController{
    public function __construct() {
        parent::__construct();
        if($this->session->get('usuario_tipo') !== 'admin'){
            Redirect::redirecionarComMensagem
            ('admin/dashboard','error','Você não tem permissão para acessar essa área.');
        }
    }
    
        
    }