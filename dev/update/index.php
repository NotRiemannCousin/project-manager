<?php
include '../../rb-mysql.php';

R::setup('mysql:host=127.0.0.1;dbname=GerenciadorProjetos', 'root');

if (!isset($_GET['id']))
    header('Location: ../../index.php?err=2');

$dev = R::load('desenvolvedor', $_GET['id']);
if (!$dev->id)
    header('Location: ../../index.php?err=2');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Atualizar Desenvolvedor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../_css/form.css">
</head>

<body>
    <?php include '../../header.php' ?>
    <main>
        <div class="cabecalho">
            <h2>Atualizar Desenvolvedor</h2>
            <form action="validate.php" method="post">


                <div class="form-group">
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="nome" <?= 'value="' . $dev->nome . '"' ?>>
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input class="form-control" type="password" name="senha"  <?= 'value="' . $dev->credencial->senha . '"' ?>>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input class="form-control" type="email" name="email" <?= 'value="' . $dev->credencial->email . '"' ?>>
                </div>
                <div class="form-group">
                    <label>Data de Nascimento:</label>
                    <input class="form-control" type="date" name="nasc" <?= 'value="' . $dev->nasc . '"' ?>  <?= 'max="'.(new DateTime('-14 years'))->format('Y-m-d').'"'?>>
                </div>
                <div class="form-group">
                    <label>Nivel:</label>
                    <?php
                    $lvl_A = '';
                    $lvl_B = '';
                    $lvl_C = '';

                    if ($dev->nivel == 'A')
                        $lvl_A = 'selected';
                    if ($dev->nivel == 'B')
                        $lvl_B = 'selected';
                    if ($dev->nivel == 'C')
                        $lvl_C = 'selected';
                    ?>
                    <select class="form-select form-select-sm" name="nivel">
                        <option value="A" <?= $lvl_A ?>>A (Básico)</option>
                        <option value="B" <?= $lvl_B ?>>B (Médio)</option>
                        <option value="C" <?= $lvl_C ?>>C (Avançado)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="admin" class="form-check-label">Administrador: </label>
                    <input class="form-control" type="checkbox" name="admin" id="admin" <?= ($dev->credencial->admin ? 'checked' : '') ?>>
                </div>
                <div class="form-group">
                    <label for="ativo" class="form-check-label">Ativo: </label>
                    <input class="form-control" type="checkbox" name="ativo" id="ativo" <?= ($dev->credencial->ativo ? 'checked' : '') ?>>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Salvar">
                </div>
        </div>
        <input class="form-control" type="text" style="display: none;" name="id"  <?= 'value="' . $dev->id . '"' ?>>
        </form>
        <div class="back-link"><a href="../../">Voltar</a></div>
        </div>
    </main>
    <?php include '../../footer.php' ?>
</body>

</html>