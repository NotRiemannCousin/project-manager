<?php
require_once 'classes/rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

if (
    (!isset($_POST['nome'])  ||
        !isset($_POST['nasc'])  ||
        !isset($_POST['nivel']) ||
        !isset($_POST['email']) ||
        !isset($_POST['senha'])
    ) ||
    !strtotime($_POST['nasc'])
) {
    if (
        isset($_POST['nome'])  &&
        isset($_POST['email'])
    ) {
        header("Location: signup.php?nome=$_POST[nome]&email=$_POST[email]");
        die;
    }
    header('Location: signup.php');
    die;
}

$nome = preg_replace("/[^a-zA-Z0-9\s!?.,\'\"]/", "", $_POST['nome']);
$nasc = $_POST['nasc'];
$nivel = filter_input(INPUT_POST, 'nivel', FILTER_VALIDATE_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = preg_replace("/[^a-zA-Z0-9\s!?.,\'\"]/", "", $_POST['senha']);
$ativo = true;
$admin = false;



$dev = R::dispense('desenvolvedor');

$dev->nome          = $nome;
$dev->nascimento    = $nasc;
$dev->nivel         = $nivel;
$dev->email         = $email;
$dev->senha         = $senha;
$dev->ativo         = $ativo;
$dev->administrador = $admin;

R::store($dev);

header('Location: login.php');
R::close();
