<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Desenvolvedor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../_css/form.css">
</head>

<body>
    <?php include '../../header.php';

    ?>
    <main>
        <div class="cabecalho">
            <h2>Cadastrar Desenvolvedor</h2>
            <form action="validate.php" method="post">


                <div class="form-group">
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="nome" <?= (isset($_GET['nome']) ? 'value=' . $_GET['nome'] : '') ?>>
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input class="form-control" type="password" name="senha">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input class="form-control" type="email" name="email" <?= (isset($_GET['email']) ? 'value=' . $_GET['email'] : '') ?>>
                </div>
                <div class="form-group">
                    <label>Data de Nascimento:</label>
                    <input class="form-control" type="date" name="nasc" <?= (isset($_GET['nasc']) ? 'value=' . $_GET['nasc'] : '') ?> <?= 'max="'.(new DateTime('-14 years'))->format('Y-m-d').'"'?>>
                </div>
                <div class="form-group">
                    <label>Nivel:</label>
                    <select class="form-control" name="nivel">
                        <option value="A" selected>A (Básico)</option>
                        <option value="B">B (Médio)</option>
                        <option value="C">C (Avançado)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="admin" class="form-check-label">Administrador: </label>
                    <input class="form-control" type="checkbox" name="admin" id="admin" <?= (isset($_GET['admin']) ? 'checked' : '') ?>>
                </div>
                <div class="form-group">
                    <label for="ativo" class="form-check-label">Ativo: </label>
                    <input class="form-control" type="checkbox" name="ativo" id="ativo" <?= (isset($_GET['ativo']) ? 'checked' : '') ?>>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Salvar">
                    <input type="reset" class="btn btn-secondary ml-2" value="Apagar Dados">
                </div>
        </div>
        </form>
        <div class="back-link"><a href="../../">Voltar</a></div>
        </div>
    </main>
    <?php include '../../footer.php' ?>
</body>

</html>
<?php
if (isset($_GET['err']) && $_GET['err'] == 1)
    echo '<script>alert("Erro!! Digite as informações corretamente.");</script>';
?>