<?php
namespace App\Backend\Controllers\Admin;
use App\Backend\Core\View;

class DashboardController extends AuthenticadedController{
    public function index() {
        View::render("admin/dashboard/index", [
            "nomeUsuario" => $this->session->get('usuario_nome'),
            "tipo" => $this->session->get('usuario_tipo'),
        ]);
        // Example method code here
        
    }
}