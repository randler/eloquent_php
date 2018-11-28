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

    public static function updateTarefa($idTarefa, $newTarefa) {
        $tarefa = Tarefa::find($idTarefa);
        
        $tarefa->nome       = $newTarefa["nome"];
        $tarefa->descricao  = $newTarefa["descricao"];

        $update = $tarefa->save();
        return $update;
    }

    public static function deleteTarefa($idTarefa) {
        $tarefa = Tarefa::find($idTarefa);
        $deleted = $tarefa->delete();
        return $deleted;
    }
}