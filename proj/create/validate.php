<?php
require_once '../../rb-mysql.php';

function checkmydate($date) {
  $tempDate = explode('-', $date);
  if(count($tempDate) != 3)
    return false;
  return checkdate($tempDate[1], $tempDate[2], $tempDate[0]);
}

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

if (
    (
        !isset($_POST['nome'])  ||
        !isset($_POST['inicio'])  ||
        !isset($_POST['terminoEsp']) ||
        !isset($_POST['termino'])
    )
) {
    header('Location: index.php?err=1.'
    .(isset($_POST['nome']) ? '&nome='.$_POST['nome'] : '')
    .(isset($_POST['inicio']) ? '&inicio='.$_POST['inicio'] : '')
    .(isset($_POST['terminoEsp']) ? '&terminoEsp='.$_POST['terminoEsp'] : '')
    .(isset($_POST['termino']) ? '&termino='.$_POST['termino'] : '')
);
    die;
}

$nome = preg_replace("/[^a-zA-Z0-9\s!?.,\'\"]/", "", $_POST['nome']);
$inicio = $_POST['inicio'];
$terminoEsp = $_POST['terminoEsp'];
$termino = $_POST['termino'];



$proj = R::dispense('projeto');

$proj->nome  = $nome;
$proj->inicio  = $inicio;
$proj->terminoEsp = $terminoEsp;
$proj->termino = $termino;


R::store($proj);

header('Location: ../../');
R::close();
