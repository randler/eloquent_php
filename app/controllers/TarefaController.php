<?php
namespace Controllers;

use Models\Tarefa;
use Models\Usuarios;

class TarefaController {

    public static function novaTarefa($nome, $descricao, $idUsuario) {
        $tarefa = Tarefa::create([
            'nome'          => $nome,
            'descricao'     => $descricao,
            'usuarios_id'   => $idUsuario
        ]);
        return $tarefa;
    }

    public static function getLazy() {
        echo "Lazy Loading \n";
        $tarefas = Tarefa::all();
        foreach ($tarefas as $tarefa) {
            echo $tarefa->usuarios->nome ."\n";
        }
    }

    public static function getEager() {
        echo "Eager Loading \n";
        $tarefas = Tarefa::with('usuarios')->get();
        foreach ($tarefas as $tarefa) {
            echo $tarefa->usuarios->nome ."\n";
        }
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