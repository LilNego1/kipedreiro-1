<?php
namespace App\backend\Validadores;

class UsuarioValidador
{
    public static function validarEntradas($dados)
    {
        $erros = [];
        if (isset($dados['nome_usuario']) && empty($dados['nome_usuario'])) {
            $erros[] = 'O campo nome é obrigatório.';
        }

        if (isset($dados['email_usuario']) && empty($dados['email_usuario'])) {
            $erros[] = 'O campo email é obrigatório e deve ser um email válido.';
        }

        if (isset($dados['senha_usuario']) && empty($dados['senha_usuario'])) {
            $erros[] = 'O campo senha é obrigatório';
        }elseif(strlen($dados['senha_usuario']) < 6){
         $erros[] = "o campo senha deve ter pelo menos 6 caracteres"; 
        }
        var_dump($erros);
        exit;
           return $erros;
    }
}