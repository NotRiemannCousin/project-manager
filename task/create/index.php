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
            <h2>Procurar Desenvolvedor e Projeto</h2>
            <form action="info.php" method="get">
                <div class="form-group">
                    <label for="dev-search">Desenvolvedor: </label>
                    <input class="form-control" type="search" name="dev-search" <?= (isset($_GET['dev-search']) ? 'value=' . $_GET['dev-search'] : '') ?>>
                </div>
                <div class="form-group">
                    <label for="proj-search">Projeto: </label>
                    <input class="form-control" type="search" name="proj-search" <?= (isset($_GET['proj-search']) ? 'value=' . $_GET['proj-search'] : '') ?>>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
        </div>
        <div class="back-link"><a href="../../">Voltar</a></div>
    </main>
</body>
<?php include_once '../../footer.php' ?>

</html>

<?php
if (isset($_GET['err'])) {
    switch ($_GET['err']) {
        case 1:
            break;
        case 2:
            echo '<script>alert("Informações inválidas!");</script>';
            break;
        case 4:
            echo '<script>alert("Usuario/Projeto não existente!");</script>';
            break;
    }
}

?>