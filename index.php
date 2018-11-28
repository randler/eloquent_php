<?php

require 'start.php';

use Controllers\UsuarioController;
use Controllers\TarefaController;


//$usuario = UsuarioController::novoUsuario('user1','user2@example.com');

// $tarefas = TarefaController::novaTarefa('Preparar a aula','Procurar um assunto que posso ser interessante', 1);

$tarefas = UsuarioController::getTarefas();
print_r($tarefas);

//$usuario = TarefaController::getUsuarioPergunta();

