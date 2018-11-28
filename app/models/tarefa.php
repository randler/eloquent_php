<?php

namespace Models;

use \Illuminate\Database\Eloquent\Model;

class Tarefa extends Model {
    public $timestamps = false;
    protected $table = 'tarefas';
    protected $fillable = [
        'nome',
        'descricao',
        'usuarios_id'
    ];

    public function usuarioPergunta()
    {
        return $this->belongsTo('\Models\Usuario');
    }
}