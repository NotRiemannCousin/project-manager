<?php
require_once '../../rb-mysql.php';
require_once '../../functions.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

if (
    (!isset($_POST['aloc-id']))  ||
    (!isset($_POST['desc'])) ||
    (R::load('alocacao', $_POST['aloc-id'])->id == 0)
) {
  header(
    'Location: info.php?err=2'
      . (isset($_POST['aloc-id']) ? '&aloc-id=' . $_POST['aloc-id'] : '')
      . (isset($_POST['desc']) ? '&desc=' . $_POST['desc'] : '')
  );
  die;
}

$alocacao = R::load('alocacao', $_POST['aloc-id']);
$descricao = $_POST['desc'];

$tarefa = R::dispense('tarefa');

$tarefa->alocacao = $alocacao;
$tarefa->descricao = $descricao;

R::store($tarefa);

header('Location: ../list/');
R::close();
