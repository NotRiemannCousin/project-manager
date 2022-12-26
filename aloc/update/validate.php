<?php
if(
    !isset($_GET['id'])      ||
    !isset($_GET['dev-id'])  ||
    !isset($_GET['proj-id']) ||
    !isset($_GET['inicio'])  ||
    !isset($_GET['term'])    ||
    !isset($_GET['remun'])   ||
    !isset($_GET['horas'])   
){
    header('location: dev-s.php?err=2');
    die;
}

require_once '../../rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');


$proj = R::load('projeto', $_GET['proj-id']);
$dev = R::load('desenvolvedor', $_GET['dev-id']);

if(!$proj || !$dev)
{
    header('location: dev-s.php?err=2');
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