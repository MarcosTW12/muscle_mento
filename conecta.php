<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Conexão</title>     
</head>
<body>
<?php
$servidor = "localhost"; //nome do servidor
$banco = "projeto"; //nome do banco
$usuario = "root"; //usuario
$senha = ""; //senha
$link = mysqli_connect($servidor,$usuario,$senha, $banco);
$db = mysqli_select_db($link, $banco);
if(!$link)
{
echo "Ocorreu um erro na conexão com o banco de dados.";
     exit();
}
?>
</body>
</html>

