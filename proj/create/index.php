<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Projeto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../form.css">
</head>

<body>
    <?php include_once '../../header.php' ?>
    <main>
        <div class="cabecalho">
            <h2>Cadastrar Projeto</h2>
            <form action="validate.php" method="post">


                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="nome" class="form-control" <?= (isset($_GET['nome']) ? 'value=' . $_GET['nome'] : '') ?>>
                </div>
                <div class="form-group">
                    <label>Início:</label>
                    <input type="date" name="inicio" class="form-control" <?= (isset($_GET['inicio']) ? 'value=' . $_GET['inicio'] : '') ?>>
                </div>
                <div class="form-group">
                    <label>Término Previsto:</label>
                    <input type="date" name="terminoEsp" class="form-control" <?= (isset($_GET['terminoEsp']) ? 'value=' . $_GET['terminoEsp'] : '') ?>>
                </div>
                <div class="form-group">
                    <label>Término:</label>
                    <input type="date" name="termino" class="form-control" <?= (isset($_GET['termino']) ? 'value=' . $_GET['termino'] : '') ?>>
                </div>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Salvar">
            <input type="reset" class="btn btn-secondary ml-2" value="Apagar Dados">
        </div>
        </form>
        </div>
    </main>
</body>

<?php include_once '../../footer.php' ?>

</html>
<?php
if (isset($_GET['err']) && $_GET['err'] == 1)
    echo '<script>alert("Erro!! Digite as informações corretamente.")</script>';
?>