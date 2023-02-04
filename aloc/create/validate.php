<?php
require_once '../../rb-mysql.php';
require_once '../../functions.php';


if (
    (!isset($_POST['dev-id'])  ||
        !isset($_POST['proj-id']) ||
        !isset($_POST['inicio'])  ||
        !isset($_POST['term'])    ||
        !isset($_POST['remun'])   ||
        !isset($_POST['horas'])
    )                                                                  ||
    (My::CheckDate($_POST['inicio']) == false)                         ||
    (My::CheckDate($_POST['term'])   == false)                         ||
    (My::CheckDate($_POST['term']) < My::CheckDate($_POST['inicio']))
) {
    header('location: dev-s.php?err=2');
    die;
}


R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');


$proj = R::load('projeto', $_POST['proj-id']);
$dev = R::load('desenvolvedor', $_POST['dev-id']);

if (!$proj || !$dev) {
    header('location: dev-s.php?err=4');
    die;
}

$aloc = R::dispense('alocacao');
$aloc->inicio = $_POST['inicio'];
$aloc->termino = $_POST['term'];
$aloc->remuneracao = $_POST['remun'];
$aloc->horas = $_POST['horas'];
$aloc->projeto = $proj;
$aloc->desenvolvedor = $dev;


R::store($aloc);

header('location: ../list/');
R::close();
