<?php
if(isset($_POST['submit']))
{
   require("conecta.php");

   //$id_usuario = $_POST["id_usuario"];
   $nome = $_POST["nome"];
   $username = $_POST["username"];
   $senha = $_POST["senha"];
   $email    = $_POST["email"];
   $telefone = $_POST["telefone"];

     // Verificar se o email já existe na tabela
    $verifica_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $result_verifica = mysqli_query($link, $verifica_email);
    if (mysqli_num_rows($result_verifica) > 0) {
        echo "<div class='alert_message error'><p>ERRO: O email '$email' já está cadastrado!</p></div>";
    } else {
                   
        $sql= "INSERT INTO usuarios ( nome, username, senha, email, telefone) VALUES ( '$nome','$username','$senha','$email','$telefone)";
           
        $res = mysqli_query($link,$sql); //or die("Falha na execução de inserção"); 

        if ($res) {                    
            echo "<div class='alert_message success'><p>Inclusão Realizada com Sucesso!</p></div>";
            
            header('Refresh: 3; URL=login.php'); // Redireciona após 3 segundos       
         
         } else {
              $erro = mysqli_error($link);
                echo "<div class='alert_message error'><p>ERRO: $erro!</p></div>";
         }  
    }  
  //Fechar a conexao
  mysqli_close($link);  
 //header('Location: login.php');   
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="css/stylesLoginx.css" type="text/css" rel="stylesheet"> 
    <style>
        /* Estilos para o formulário de cadastro */
        body {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
        }

        .box {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .box fieldset {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        .box legend {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .inputBox {
            position: relative;
            margin-bottom: 30px;
        }

        .input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .labelInput {
            position: absolute;
            top: 10px;
            left: 10px;
            pointer-events: none;
            transition: 0.3s;
        }

        .input:focus + .labelInput,
        .input:valid + .labelInput {
            top: -15px;
            left: 5px;
            font-size: 14px;
            color: #007bff;
        }

        #submit {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #submit:hover {
            background-color: #0056b3;
        }

        .alert_message {
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
            font-weight: bold;
        }

        .alert_message.success {
            background-color: #28a745;
            color: #fff;
        }

        .alert_message.error {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- <a href="acesso.php">Controle de Acesso</a> -->
    <div class="box">
        <form action="cadastrarUsuario.php" method="post">
            <fieldset>
                <legend><b>Cadastro de Usuários</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="input" maxlength="30" 
                    title="Informe o NOME"
                    required>
                    <label for="nome" class="labelInput">Nome</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="username" id="username" class="input" maxlength="8" 
                    title="Informe o USERNAME"
                    required>
                    <label for="username" class="labelInput">Apelido</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="input" maxlength="8"  
                    title="Informe a Senha de acesso"
                    required>                   
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>               
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="input" 
                    maxlength="30" title="Informe o email válido"
                    required>                   
                    <label for="email" class="labelInput">E-mail</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="input" 
                    maxlength="15"  title="Informe um número de telefone"
                    required>                   
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
