<?php
namespace Controllers;

use Models\Tarefa;
use Models\Usuarios;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Capsule\Manager as DB;

class TarefaController {

    public static function novaTarefa($nome, $descricao, $idUsuario) {
        $tarefa = Tarefa::create([
            'nome'          => $nome,
            'descricao'     => $descricao,
            'usuarios_id'   => $idUsuario
        ]);
        return $tarefa;
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

    public static function getLazy()
    {
        $tarefas = Tarefa::all();
        foreach ($tarefas as $tarefa)
            print_r($tarefa->usuarios . "\n");
        $queries = DB::getQueryLog();
        foreach ($queries as $query)
            print_r($query['query'] . ' - id: ' . $query['bindings'][0] . "\n" );
        
    }

    public static function getEager()
    {
        $tarefas = Tarefa::with('usuarios')->get();
        foreach ($tarefas as $tarefa)
            print_r($tarefa->usuarios . "\n");
        $queries = DB::getQueryLog();
        foreach ($queries as $query)
            print_r($query['query'] . "\n" );
        
    }


}
