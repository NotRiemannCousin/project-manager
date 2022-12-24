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
        <form action="validate.php" method="get">
            <div class="form-group">
                <label class="label-control">Desenvolvedor</label>
                <input type="text" class="form-control" class="form-control" <?= 'value="' . $dev->nome.'"' ?> readonly>
                <input type="text" name="dev-id" <?= 'value="' . $dev->id . '"' ?> style="display: none">
            </div>
            <div class="form-group">
                <label class="label-control">Projeto</label>
                <input type="text" class="form-control" class="form-control" <?= 'value="' . $proj->nome.'"' ?> readonly>
                <input type="text" name="proj-id" <?= 'value="' . $proj->id . '"' ?> style="display: none">
            </div>
            <div class="form-group">
                <label class="label-control" for="inicio">Início</label>
                <input type="date" name="inicio" id="inicio" class="form-control">
            </div>
            <div class="form-group">
                <label class="label-control" for="term">Término</label>
                <input type="date" name="term" id="term" class="form-control">
            </div>
            <div class="form-group">
                <label class="label-control" for="remun">Remuneração</label>
                <input type="number" name="remun" id="remun" class="form-control">
            </div>
            <div class="form-group">
                <label class="label-control" for="horas">Horas Semanais</label>
                <input type="number" name="horas" id="horas" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>
    </div>
</main>
</body>
<?php include_once '../../footer.php' ?>

</html>