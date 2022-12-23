<?php
if (!isset($_GET['proj-id']) && !isset($_GET['dev-id'])) {
    header('Location: dev-s.php?err=2');
    die;
}

require_once '../../rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

$proj = R::load('projeto', $_GET['proj-id']);
$dev = R::load('desenvolvedor', $_GET['dev-id']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Entrar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../form.css">
</head>
<?php include_once '../../header.php' ?>
<main>
    <div class="cabecalho">
        <ul class="list-group">
            <?php
            echo $proj->nome;
            ?>
        </ul>
    </div>
</main>
</body>
<?php include_once '../../footer.php' ?>

</html>