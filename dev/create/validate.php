<?php
require_once '../../rb-mysql.php';
require_once '../../functions.php';


if (
    (!isset($_POST['nome'])     ||
        !isset($_POST['nasc'])  ||
        !isset($_POST['nivel']) ||
        !isset($_POST['email']) ||
        !isset($_POST['senha'])
    )                                                           ||
    (My::CheckDate($_POST['nasc']) == false)                    ||
    (My::CheckDate($_POST['nasc']) > new DateTime('-14 years'))
) {
    header(
        'Location: index.php?err=1.'
            . (isset($_POST['nome']) ? '&nome=' . $_POST['nome'] : '')
            . (isset($_POST['nasc']) ? '&nasc=' . $_POST['nasc'] : '')
            . (isset($_POST['nivel']) ? '&nivel=' . $_POST['nivel'] : '')
            . (isset($_POST['email']) ? '&email=' . $_POST['email'] : '')
            . (isset($_POST['admin']) ? '&admin=' . $_POST['admin'] : '')
            . (isset($_POST['ativo']) ? '&ativo=' . $_POST['ativo'] : '')
    );
    die;
}


R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

$nome = preg_replace("/[^a-zA-Z0-9\s!?.,\'\"]/", "", $_POST['nome']);
$nasc = $_POST['nasc'];
$nivel = $_POST['nivel'];
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = preg_replace("/[^a-zA-Z0-9\s!?.,\'\"]/", "", $_POST['senha']);
$ativo = (isset($_POST['ativo']) && $_POST['ativo'] == 'on' ? 1 : 0);
$admin = (isset($_POST['admin']) && $_POST['admin'] == 'on' ? 1 : 0);



$dev = R::dispense('desenvolvedor');

$dev->nome  = $nome;
$dev->nasc  = $nasc;
$dev->nivel = $nivel;
$dev->email = $email;
$dev->senha = $senha;
$dev->ativo = $ativo;
$dev->admin = $admin;

R::store($dev);

header('Location: ../list/');
R::close();
