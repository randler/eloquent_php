<?php
namespace Controllers;

use Models\Tarefa;

class TarefaController {

    public static function novaTarefa($nome, $descricao, $idUsuario) {
        $tarefa = Tarefa::create([
            'nome'          => $nome,
            'descricao'     => $descricao,
            'usuarios_id'   => $idUsuario
        ]);
        return $tarefa;
    }

    public static function getUsuarioPergunta() {
        $usuario = Tarefa::with('usuarios')->get()->toArray();
        return $usuario;
    }
}