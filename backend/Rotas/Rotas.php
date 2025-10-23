<?php

namespace App\Backend\Rotas;

class Rotas
{
    public static function get()
    {
        return [
            "GET" => [
                "/" => "Admin\DashboardController@index",
                "/usuarios" => "UsuarioController@index",
                "/usuario/criar" => "UsuarioController@viewCriarUsuarios",
                "/usuario/listar" => "UsuarioController@viewListarUsuarios",
                "/usuario/listar/{pagina}" => "UsuarioController@viewListarUsuarios",
                "/usuario/editar/{id}" => "UsuarioController@viewEditarUsuarios",
                "/usuario/excluir/{id}" => "UsuarioController@viewExcluirUsuarios",
 
                '/register' => 'AuthController@register',
                '/login' => 'AuthController@login',
                '/logout' => 'AuthController@logout',
                '/admin/dashboard' => 'Admin\DashboardController@index',
 
                'servico/listar' => 'ServicoController@viewListarServicos',
                'servico/listar/{pagina}' => 'ServicoController@viewListarServicos',
                'servico/criar' => 'ServicoController@viewCriarServico',
                'api/servicos' => 'PublicApiController@getServicos',
                'servico/editar/{id}' => 'ServicoController@viewEditarServico',
                'servico/excluir/{id}' => 'ServicoController@viewExcluirServico',
               
 
                '/esqueci-senha' => 'AuthController@viewEsqueciSenha',
                '/reseta-senha/{token}' => 'AuthController@viewFormTrocaSenha',

                '/api/produtos' => 'PublicApiController@getProdutos',
            ],
           
            "POST" => [
                "/usuario/salvar" => "UsuarioController@salvarUsuario",
                "/usuario/atualizar/{id}" => "UsuarioController@atualizarUsuario",
                "/usuario/deletar/{id}" => "UsuarioController@deletarUsuario",
 
                '/register' => 'AuthController@cadastrarUsuario',
                '/login' => 'AuthController@authenticar',
 
                'servico/salvar' => 'ServicoController@salvarServico',
                'servico/atualizar' => 'ServicoController@atualizarServico',
                'servico/deletar' => 'ServicoController@deletarServico',
 
                '/esqueci-senha' => 'AuthController@enviarLinkDoEmail',
                '/reseta-senha' => 'AuthController@resetaSenha',

                '/api/pedidos' => 'PublicApiController@salvarPedido',
            ]
    ];
    }
}
