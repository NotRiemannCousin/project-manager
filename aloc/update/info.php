<?php
if (!isset($_GET['id'])) {
    header('../../?err=2');
    die;
}

require_once '../../rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

$aloc = R::load('alocacao', $_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Entrar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../_css/form.css">
</head>
<?php include_once '../../header.php' ?>
<main>
    <form action="validate.php" method="post">
        <div class="cabecalho">
            <input class="form-control" type="text" name="id" <?= 'value="' . $_GET['id'] . '"' ?> style="display: none">
            <div class="form-group">
                <label class="label-control">Desenvolvedor</label>
                <input class="form-control" type="text" <?= 'value="' . $aloc->desenvolvedor->nome . '"' ?> readonly>
                <input class="form-control" type="text" name="dev-id" <?= 'value="' . $aloc->desenvolvedor->id . '"' ?> style="display: none">
            </div>
            <div class="form-group">
                <label class="label-control">Projeto</label>
                <input class="form-control" type="text" <?= 'value="' . $aloc->projeto->nome     . '"' ?> readonly>
                <input class="form-control" type="text" name="proj-id" <?= 'value="' . $aloc->projeto->id . '"' ?> style="display: none">
            </div>
            <div class="form-group">
                <label class="label-control" for="inicio">Início</label>
                <input class="form-control" type="date" name="inicio" id="inicio" <?= 'value="' . $aloc->inicio . '"' ?>>
            </div>
            <div class="form-group">
                <label class="label-control" for="term">Término</label>
                <input class="form-control" type="date" name="term" id="term" <?= 'value="' . $aloc->termino . '"' ?>>
            </div>
            <div class="form-group">
                <label class="label-control" for="remun">Remuneração</label>
                <input class="form-control" type="number" name="remun" id="remun" <?= 'value="' . $aloc->remuneracao . '"' ?>>
            </div>
            <div class="form-group">
                <label class="label-control" for="horas">Horas Semanais</label>
                <input class="form-control" type="number" name="horas" id="horas" <?= 'value="' . $aloc->horas . '"' ?>>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>
        </div>
    </form>
    <div class="back-link"><a href="../../">Voltar</a></div>
</main>
</body>
<?php include_once '../../footer.php' ?>

</html>