<?php
namespace Controllers;

use Models\Usuarios;

class UsuarioController {


    public static function novoUsuario($nome, $email) {
        $usuario = Usuarios::create([
            'nome' => $nome,
            'email' => $email
        ]);
        return $usuario;
    }

    public static function getTarefas() {
        $tarefas = Usuarios::with('tarefas')->get()->toArray();
        return $tarefas;
    }

}