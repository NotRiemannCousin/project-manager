<?php
if (!isset($_GET['dev-id'])) {
    header('Location: dev-s.php?err=2');
    die;
}

require_once '../../rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Entrar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../_css/form.css">
    <link rel="script" href="list.js">
</head>
<?php include_once '../../header.php' ?>
<body>
    <main>
        <div class="cabecalho">
            <h2>Procurar projeto</h2>
            <form action="proj-c.php" method="get">
                <div class="form-group">
                    <input class="form-control" type="search" name="proj-search" <?= (isset($_GET['proj-search']) ? 'value=' . $_GET['proj-search'] : '') ?>>
                    <input class="form-control" type="text" name="dev-id" <?= 'value="'.$_GET['dev-id'].'"' ?> style="display: none">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </div>
            <a href="proj-c.php?proj-search=dev-s.php">voltar</a>
    </main>
</body>
<?php include_once '../../footer.php' ?>

</html>