<?php

namespace App\Backend\Rotas;

class Rotas
{
    public static function get()
    {
        return [
            "GET" => [
        // caminho da url   nome e metodo de controlers
        "/backend/usuario" => "UsuarioController@index",
        "/backend/usuario/criar" => "UsuarioController@viewCriarUsuarios",
        "/backend/usuario/editar" => "UsuarioController@viewEditarUsuarios",
        "/backend/usuario/excluir" => "UsuarioController@viewExcluirUsuarios",
        "/backend/usuario/listar" => "UsuarioController@viewListarUsuarios",
    ],
    "POST" => [
        "/backend/usuario/salvar" => "UsuarioController@salvarUsuarios",
        "/backend/usuario/atualizar" => "UsuarioController@atualizarUsuarios",
        "/backend/usuario/deletar" => "UsuarioController@deletarUsuarios",
]
    ];
        
    }
}
