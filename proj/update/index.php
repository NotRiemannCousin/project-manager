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
    <title>Atualizar Projeto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../_css/form.css">
</head>

<body>
    <?php include '../../header.php' ?>
    <main>
        <div class="cabecalho">
            <h2>Atualizar Projeto</h2>
            <form action="validate.php" method="post">


                <div class="form-group">
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="nome" <?= 'value="' . $proj->nome . '"' ?>>
                </div>
                <div class="form-group">
                    <label>Início:</label>
                    <input class="form-control" type="date" name="inicio" <?= 'value="' . $proj->inicio . '"' ?>>
                </div>
                <div class="form-group">
                    <label>Término Previsto:</label>
                    <input class="form-control" type="date" name="terminoEsp" <?= 'value="' . $proj->terminoEsp . '"' ?>>
                </div>
                <div class="form-group">
                    <label>Término:</label>
                    <input class="form-control" type="date" name="termino" <?= 'value="' . $proj->termino . '"' ?>>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Salvar">
                </div>
                <input class="form-control" type="text" style="display: none;" name="id" <?= 'value="' . $proj->id . '"' ?>>
            </form>
        </div>
            <div class="back-link"><a href="../../">Voltar</a></div>
    </main>
    <?php include '../../footer.php' ?>
</body>

</html>