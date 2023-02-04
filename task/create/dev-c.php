<?php
if (!isset($_GET['dev-search'])) {
    header('Location: dev-s.php?err=2');
    die;
}

require_once '../../rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

$data = R::getAll("SELECT alocacao.id, desenvolvedor.nome as \"desenvolvedor\", projeto.nome as \"projeto\" FROM alocacao, projeto, desenvolvedor WHERE alocacao.desenvolvedor_id = desenvolvedor.id AND alocacao.projeto_id = projeto.id" . (isset($_GET['dev-search']) ? 'AND INSTR(desenvolvedor.nome, "' . $_GET['dev-search'] . '")' : '') . (isset($_GET['dev-search']) ? 'AND INSTR(projeto.nome, "' . $_GET['proj-search'] . '")' : ''));
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
        <form action="validate.php" method="post">
            <label>Alocação: </label>
            <select id="aloc" name="aloc">
                <?php
                foreach ($data as $aloc) {
                    echo '<option value="' . $aloc['id'] . '">' . $aloc['desenvolvedor'] . ", em \"" . $aloc['projeto'] . "\"" . '</option>';
                }
                ?>
                <label>Alocação: </label>
                <input type="text" name="desc" id="desc">
            </select>
        </form>
    </div>
    <?= '<a href="../../">voltar</a>' ?>
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