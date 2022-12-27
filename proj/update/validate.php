<?php
require_once '../../rb-mysql.php';
require_once '../../functions.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

if (
    (!isset($_POST['nome'])          ||
        !isset($_POST['inicio'])     ||
        !isset($_POST['terminoEsp']) ||
        !isset($_POST['termino'])    ||
        !isset($_POST['id'])
    )                                                                       ||
    (My::CheckDate($_POST['inicio']) == false)                              ||
    (My::CheckDate($_POST['terminoEsp']) == false)                          ||
    (My::CheckDate($_POST['termino']) == false)                             ||
    (My::CheckDate($_POST['inicio']) > My::CheckDate($_POST['terminoEsp'])) ||
    (My::CheckDate($_POST['inicio']) > My::CheckDate($_POST['termino']))

) {
    header(
        'Location: index.php?err=1.'
            . (isset($_POST['nome']) ? '&nome=' . $_POST['nome'] : '')
            . (isset($_POST['inicio']) ? '&inicio=' . $_POST['inicio'] : '')
            . (isset($_POST['terminoEsp']) ? '&terminoEsp=' . $_POST['terminoEsp'] : '')
            . (isset($_POST['termino']) ? '&termino=' . $_POST['termino'] : '')
    );
    die;
}

$nome = preg_replace("/[^a-zA-Z0-9\s!?.,\'\"]/", "", $_POST['nome']);
$inicio = $_POST['inicio'];
$terminoEsp = $_POST['terminoEsp'];
$termino = $_POST['termino'];



$proj = R::load('projeto', $_POST['id']);

$proj->nome  = $nome;
$proj->inicio  = $inicio;
$proj->terminoEsp = $terminoEsp;
$proj->termino = $termino;


R::store($proj);

header('Location: ../list/');
R::close();
