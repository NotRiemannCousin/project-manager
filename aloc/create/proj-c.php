<?php
if (!isset($_GET['proj-search']) && !isset($_GET['dev-id'])) {
    header('Location: dev-s.php?err=2');
    die;
}

require_once '../../rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

$projs = R::findAll('projeto', 'INSTR(nome, "' . $_GET['proj-search'] . '")');
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

    <div class=" cabecalho">
        <ul class="list-group">
            <?php
            foreach ($projs as $proj) {
                echo '<li class="list-group-item"><a href="info.php?"dev-id=' . $_GET['dev-id'] . 'proj-id=' . $proj->id . '">' . $proj->nome . '</a></li>';
            }
            ?>
        </ul>
    </div>
    <?= '<a href="proj-c.php?proj-search=' . $_GET['proj-search'] . '">voltar</a>' ?>
</main>
</body>
<?php include_once '../../footer.php' ?>

</html>