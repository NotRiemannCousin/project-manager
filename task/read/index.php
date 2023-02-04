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
    <?php
    require_once '../../rb-mysql.php';
    R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');
    $projs = R::findAll('projeto');
    ?>
    <main>
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
            echo '<script>alert("ID inválido!");</script>';
            break;
    }
}

?>