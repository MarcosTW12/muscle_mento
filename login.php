<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/login.css" type="text/css" rel="stylesheet">
</head>
<body>
   <!-- <a href="acesso.php">Página de Acesso</a> -->
    <div class="box">
        <form action="index.php" method="post"> 
            <fieldset>
                <legend><b>Login</b></legend>
                <br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="input" maxlength="30" 
                     title="Informe o email do Usuário" placeholder="E-mail"
                    required>
                    <label for="email" class="LabelInput"></label>                    
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="input" 
                    maxlength="8"  title="Informe a Senha de acesso!!!" placeholder="Senha"
                    required>                   
                    <label for="senha" class="labelInput"></label>
                </div>
                <br><br>               
                <input class="submit" type="submit" name="submit" value="Entrar" id="submit">   
                <br><br><br>
                <a href="cadastrarUsuario.php"  id="cadnovo" class="btn">Cadastrar Novo Usuário</a> 
                <br><br><br>
            </fieldset>
        </form>
    </div>
</body>
</html>