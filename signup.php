<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body
        { 
         font: 14px sans-serif;
        }

        .cabeçalho
        { 
         width: 360px;
         padding: 20px; 
        }
    </style>
</head>
<body>
    <div class="cabeçalho">
        <h2>Cadastro</h2>
        <p>Por favor, preencha este formulário para criar uma conta.</p>
        <form action="index.html" method="post">


            <div class="form-group">
                <label>Nome do usuário</label>
                <input type="text" name="username" class="form-control">
            </div> 


            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control">
                
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
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
