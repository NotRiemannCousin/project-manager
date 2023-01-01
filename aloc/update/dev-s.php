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
            <h2>Procurar Desenvolvedor</h2>
            <form action="dev-c.php" method="get">
                <div class="form-group">
                    <input type="search" name="dev-search" class="form-control" <?= (isset($_GET['dev-search']) ? 'value=' . $_GET['dev-search'] : '') ?>>
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
    }
}

?>