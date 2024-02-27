<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    // Configure o endereço de e-mail para onde você deseja enviar as mensagens de contato
    $destinatario = "truiznatacha@gmail.com";

    // Monta o corpo do e-mail
    $corpo_email = "Nome: $nome\n";
    $corpo_email .= "E-mail: $email\n";
    $corpo_email .= "Assunto: $assunto\n";
    $corpo_email .= "Mensagem:\n$mensagem";

    // Envia o e-mail
    if (mail($destinatario, "Contato do Site - $assunto", $corpo_email)) {
        echo "<p class='mensagem sucesso'>Sua mensagem foi enviada com sucesso!</p>";
    } else {
        echo "<p class='mensagem erro'>Desculpe, ocorreu um erro ao enviar sua mensagem. Por favor, tente novamente mais tarde.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato</title>
    <link href="css/contato.css" type="text/css" rel="stylesheet">

</head>
<body>
    <h1>Entre em Contato</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="assunto">Assunto:</label>
        <input type="text" id="assunto" name="assunto" required>

        <label for="mensagem">Mensagem:</label>
        <textarea id="mensagem" name="mensagem" rows="4" required></textarea>

        <button type="submit">Enviar Mensagem</button>
    </form>
</body>
</html>
