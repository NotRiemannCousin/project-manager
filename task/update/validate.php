<?php
require_once '../../rb-mysql.php';
require_once '../../functions.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

if (
    (!isset($_POST['id']))                            ||
    (!isset($_POST['desc']))                          ||
    (R::load('tarefa', $_POST['id'])->id == 0)
) {
  header(
    'Location: index.php?err=2'
      . (isset($_POST['desc']) ? '&desc=' . $_POST['desc'] : '')
      . (isset($_POST['id']) ? '&id=' . $_POST['id'] : '')
  );
  die;
}

$descricao = $_POST['desc'];

$tarefa = R::load('tarefa', $_POST['id']);

$tarefa->descricao = $descricao;

R::store($tarefa);

header('Location: ../list/');
R::close();
