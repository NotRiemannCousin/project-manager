<?php
include '../../rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

if (!isset($_GET['id']))
    header('Location: ../../index.php?err=2');

$proj = R::load('projeto', $_GET['id']);
if (!$proj->id)
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
        <h1><?= $proj->nome ?></h1>
        <p>ID: <?= $proj->id ?></p>
        <p>Início: <?= $proj->inicio ?></p>
        <p>Término Esperado: <?= $proj->terminoEsp ?></p>
        <p>Término: <?= $proj->termino ?></p>
    </main>
    <?php include_once '../../footer.php' ?>
</body>

</html>