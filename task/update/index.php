<?php
include '../../rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

if (!isset($_GET['id']))
    header('Location: ../list/  ?err=2');

$task = R::load('tarefa', $_GET['id']);
if (!$task->id)
    header('Location: ../list/  ?err=2');
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
            <h2>Atualizar Tarefa</h2>
            <form action="validate.php" method="post">

                
                <input class="form-control" type="text" name="id" <?= 'value="'.$task->id.'"' ?> style="display: none">
                <div class="form-group">
                    <label>Alocação:</label>
                    <input class="form-control" type="text" <?= 'value="'. $task->alocacao->desenvolvedor->nome . ', em &quot;' . $task->alocacao->projeto->nome. '&quot;"' ?> disabled>
                </div>
                <div class="form-group">
                    <label for="desc">Descrição: </label>
                    <textarea class="form-control" type="text" name="desc" id="desc"><?= $task->descricao ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Salvar">
                </div>
                <input class="form-control" type="text" style="display: none;" name="id" <?= 'value="' . $task->id . '"' ?>>
            </form>
        </div>
            <div class="back-link"><a href="../../">Voltar</a></div>
    </main>
    <?php include '../../footer.php' ?>
</body>

</html>

<?php
if (isset($_GET['err'])) {
    switch ($_GET['err']) {
        case 1:
            break;
        case 2:
            echo '<script>alert("ID inválido!");</script>';
            break;
    }
}
?>