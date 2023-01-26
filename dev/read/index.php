<?php
include '../../rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

if (!isset($_GET['id']))
    header('Location: ../../index.php?err=2');

$dev = R::load('desenvolvedor', $_GET['id']);
if (!$dev->id)
    header('Location: ../../index.php?err=2');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Entrar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../_css/index.css">
</head>
<?php include_once '../../header.php' ?>

<body>
    <main>
        <h1><?= $dev->nome ?></h1>
        <p>ID: <?= $dev->id ?></p>
        <p>Nome: <?= $dev->nome ?></p>
        <p>Nascimento: <?= $dev->nasc ?></p>
        <p>Nivel: <?= $dev->nivel ?></p>
        <p>Email: <?= $dev->credencial->email ?></p>
        <p>Senha: <?= $dev->credencial->senha ?></p>
        <p>Admin: <?= ($dev->credencial->admin ? 'sim' : 'não') ?></p>
        <p>Ativo: <?= ($dev->credencial->ativo ? 'sim' : 'não') ?></p>
    </main>
    <?php include_once '../../footer.php' ?>
</body>

</html>