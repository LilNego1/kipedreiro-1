<?php

namespace App\Backend\Rotas;

class Rotas
{
    public static function get()
    {
        return [
            "GET" => [
        // caminho da url   nome e metodo de controlers
        "/backens/usuarios" => "UsuarioController@index",
        "/backend/usuarios/criar" => "UsuarioController@viewCriarUsuarios",
        "/backend/usuarios/editar" => "UsuarioController@viewEditarUsuarios",
        "/backend/usuarios/excluir" => "UsuarioController@viewExcluirUsuarios",
        "/backend/usuarios/listar" => "UsuarioController@viewListarUsuarios",
    ],
    "POST" => [
        "/backend/usuarios/salvar" => "UsuarioController@salvarUsuarios",
        "/backend/usuarios/atualizar" => "UsuarioController@atualizarUsuarios",
        "/backend/usuarios/deletar" => "UsuarioController@deletarUsuarios",
]
    ];
        
    }
}
