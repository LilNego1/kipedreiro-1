<?php

namespace App\Backend\Rotas;

class Rotas
{
    public static function get()
    {
        return [
            "GET" => [
        // caminho da url   nome e metodo de controlers
        "/usuario" => "UsuarioController@index",
        "/usuario/criar" => "UsuarioController@viewCriarUsuarios",
        "/usuario/editar/{id}" => "UsuarioController@viewEditarUsuarios",
        "/usuario/excluir/{id}" => "UsuarioController@viewExcluirUsuarios",
        "/usuario/listar/{pagina}" => "UsuarioController@viewListarUsuarios",

        // Rotas de autenticação
        "/login" => "AuthControllers@login",
        "/register" => "AuthControllers@register",
        "/logout" => "AuthControllers@logout",
        "/admin/dashboard" => "Admin\dashboardController@index",
    ],
    "POST" => [
        "/usuario/salvar" => "UsuarioController@salvarUsuarios",
        "/usuario/atualizar" => "UsuarioController@atualizarUsuarios",
        "/usuario/deletar" => "UsuarioController@deletarUsuarios",

        // Rotas de autenticação
        "/login" => "AuthControllers@autenticar",
        "/register" => "AuthControllers@cadastrarUsuario",
]
    ];
    }
}
