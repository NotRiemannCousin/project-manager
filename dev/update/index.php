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
    <link rel="stylesheet" href="../../form.css">
</head>

<body>
    <?php include '../../header.php' ?>
    <main>
        <div class="cabecalho">
            <h2>Atualizar Desenvolvedor</h2>
            <form action="validate.php" method="post">


                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="nome" class="form-control" <?= 'value="' . $dev->nome . '"' ?>>
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" name="senha" class="form-control"  <?= 'value="' . $dev->senha . '"' ?>>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" <?= 'value="' . $dev->email . '"' ?>>
                </div>
                <div class="form-group">
                    <label>Data de Nascimento:</label>
                    <input type="date" name="nasc" class="form-control" <?= 'value="' . $dev->nasc . '"' ?>>
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
                    <input type="checkbox" name="admin" id="admin" <?= ($dev->admin ? 'checked' : '') ?>>
                </div>
                <div class="form-group">
                    <label for="ativo" class="form-check-label">Ativo: </label>
                    <input type="checkbox" name="ativo" id="ativo" <?= ($dev->ativo ? 'checked' : '') ?>>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Salvar">
                </div>
        </div>
        <input type="text" style="display: none;" name="id"  <?= 'value="' . $dev->id . '"' ?>>
        </form>
        <a href="../../">Voltar</a>
        </div>
    </main>
    <?php include '../../footer.php' ?>
</body>

</html>