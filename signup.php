<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <div class="cabecalho">
        <h2>Cadastro</h2>
        <p>Por favor, preencha este formulário para criar uma conta.</p>
        <form action="user_creation.php" method="post">


            <div class="form-group">
                <label>Nome do usuário:</label>
                <input type="text" name="nome" class="form-control"
                <?= isset($_GET['nome']) ? $_GET['nome']:'' ?>
                >
            </div>
            <div class="form-group">
                <label>Senha:</label>
                <input type="password" name="senha" class="form-control">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control"
                <?= isset($_GET['nome']) ? $_GET['nome']:'' ?>>
            </div>
            <div class="form-group">
                <label>Data de Nascimento:</label>
                <input type="date" name="nasc" class="form-control">
            </div>
            <div class="form-group">
                <label>Nivel:</label>
                <div class="form-group">
                    <input type="radio" name="nivel" value="0" id="basico" class="form-control-radio" checked>
                    <label for="basico" class="form-control-label">Básico</label>

                    <input type="radio" name="nivel" value="1" id="medio" class="form-control-radio">
                    <label for="medio" class="form-control-label">Médio</label>

                    <input type="radio" name="nivel" value="2" id="avancado" class="form-control-radio">
                    <label for="avancado" class="form-control-label">Avançado</label>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Criar Conta">
                <input type="reset" class="btn btn-secondary ml-2" value="Apagar Dados">
            </div>


            <p>Já tem uma conta? <a href="login.php">Entre aqui</a>.</p>
        </form>
    </div>
</body>

</html>