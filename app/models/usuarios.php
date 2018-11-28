<?php

namespace Models;

use \Illuminate\Database\Eloquent\Model;

class Usuarios extends Model {

    public $timestamps = false;
    protected $table = 'usuarios';
    protected $fillable = [
        'nome',
        'email'
    ];

    public function tarefas()
    {
        return $this->hasMany('\Models\Tarefa');
    }

}
