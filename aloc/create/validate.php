<?php
require_once '../../rb-mysql.php';
require_once '../../functions.php';


if (
    (
        !isset($_GET['dev-id'])  ||
        !isset($_GET['proj-id']) ||
        !isset($_GET['inicio'])  ||
        !isset($_GET['term'])    ||
        !isset($_GET['remun'])   ||
        !isset($_GET['horas'])
    )                                                                 ||
    (My::CheckDate($_GET['inicio']) == false)                         ||
    (My::CheckDate($_GET['term'])   == false)                         ||
    (My::CheckDate($_GET['inicio']) > new DateTime())                 ||
    (My::CheckDate($_GET['term']) > My::CheckDate($_GET['inicio']))
) {
    header('location: dev-s.php?err=2');
    die;
}



R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');


$proj = R::load('projeto', $_GET['proj-id']);
$dev = R::load('desenvolvedor', $_GET['dev-id']);

if (!$proj || !$dev)
{
    header('location: dev-s.php?err=4');
    die;
}

$aloc = R::load('alocacao', $_GET['id']);
$aloc->inicio = $_GET['inicio'];
$aloc->termino = $_GET['term'];
$aloc->remuneracao = $_GET['remun'];
$aloc->horas = $_GET['horas'];
$aloc->projeto = $proj;
$aloc->desenvolvedor = $dev;


R::store($aloc);

header('location: ../list/');
R::close();
