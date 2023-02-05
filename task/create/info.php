<?php
if (isset($_GET['proj-search']) && $_GET['proj-search'] == '')
    unset($_GET['proj-search']);
if (isset($_GET['dev-search']) && $_GET['dev-search'] == '')
    unset($_GET['dev-search']);

//     header('Location: dev-s.php?err=2');
//     die;
// }

require_once '../../rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

$data = R::getAll('SELECT alocacao.id, desenvolvedor.nome as "desenvolvedor", projeto.nome as "projeto" FROM alocacao, projeto, desenvolvedor WHERE alocacao.desenvolvedor_id = desenvolvedor.id AND alocacao.projeto_id = projeto.id' . (isset($_GET['dev-search']) ? ' AND INSTR(desenvolvedor.nome, "' . $_GET['dev-search'] . '")' : '') . (isset($_GET['proj-search']) ? ' AND INSTR(projeto.nome, "' . $_GET['proj-search'] . '")' : ''));

if (count($data) == 0)
    header('Location: index.php?err=2');

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
            <div class="form-group">

                <select class="form-control" id="aloc" name="aloc-id">
                    <?php
                    foreach ($data as $aloc) {
                        echo '<option value="' . $aloc['id'] . '" ' . (isset($_GET['dev-search']) && $_GET['dev-search'] == $aloc['id'] ? 'selected' : '') . '>' . $aloc['desenvolvedor'] . ', em "' . $aloc['projeto'] . '"</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="desc">Descrição: </label>
                <textarea class="form-control" type="text" name="desc" id="desc"><?= (isset($_GET['desc']) ? $_GET['desc'] : '') ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
    <div class="back-link">
        <?= '<a href="index.php">voltar</a>' ?>
    </div>
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