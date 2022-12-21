<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Entrar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <main>
        <div class="cabecalho">
            <h2>Entrar</h2>
            <p>Entre para logar.</p>
            <form action="validate_user_verify.php" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" class="form-control">

                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Entrar">
                </div>

                <p>Ainda não tem uma conta? <a href="signup.php">Entre aqui</a>.</p>
            </form>
        </div>
    </main>
</body>

</html>