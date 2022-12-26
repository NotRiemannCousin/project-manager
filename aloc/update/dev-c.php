<?php
if (!isset($_GET['dev-search'])) {
    header('Location: dev-s.php?err=2');
    die;
}

require_once '../../rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

$devs = R::findAll('desenvolvedor', 'INSTR(nome, "' . $_GET['dev-search'] . '")');
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
    <div class="cabecalho">
        <ul class="list-group">
            <?php
            foreach ($devs as $dev) {
                echo '<li class="list-group-item"><a href="proj-s.php?dev-id=' . $dev->id . '">' . $dev->nome . '</a></li>';
            }
            
            ?>
        </ul>
    </div>
    <?= '<a href="proj-c.php?proj-search=' . $_GET['dev-search'] . '">voltar</a>' ?>
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