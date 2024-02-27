<?php
    include("nav.php");
?>
       <!--============================== END OF NAV =======================================-->  
<?php 
require("conecta.php");
if (!isset($_POST["id"]) && !isset($_POST["enviar"]))
{
?>
<section class="form_section">
    <div class="container form_section-container">   
    <link rel="stylesheet" type="text/css" href="css/alterar.css"> 
    <br>        <br>  
        <h2>Alterar Produtos</h2>      
        <br>      
        <!-- <div class="alert_message error"><p>Acesso Negado!!!</p></div> -->            
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <input type="text" id="id" name="id" maxlength="3" placeholder="Identificação o Produto" required/> 
            <br>        <br>             
            <main>    
            <table>                    
                    <tbody>
                        <tr>
                            <td> <button class="btn sm" type="submit" value="Enviar" id="submit">Prosseguir</button></td>                            
                            <td> <button class="btn sm danger" type="reset"  value="Limpar" id="Cancelar">Limpar</button></td>                                                        
                        </tr>                    
                    </tbody>
                </table>
            </main>
            </form>
        </div>
        </section>
<?php
}
else if (!isset($_POST["enviar"])) // busca autor 
{
    $id = $_POST["id"];
    echo $id;
    $sql = "select * FROM produtos WHERE id = '$id'";
    $res = mysqli_query($link,$sql) or die("Falha na execução de inserção");
    if (mysqli_num_rows($res)==0)
    {
    ?>
        <div class="alert_message error"><p>Produto não Localizado no BD!</p></div>       
    <?php
    }
    else 
    {
     ?>   
        <!-- <div class="alert_message success"><p>Autor Localizado!</p></div>   -->    
     <?php           
        $registro = mysqli_fetch_row($res); //seta p o registro
        $id = $registro[0];
        $nome = $registro[1];
        $marca = $registro[2];
        $descricao = $registro[3];


        ?>
        <section class="form_section">
        <div class="container form_section-container">                       
            <div class="alert_message1 success"><p>Produto Localizado!</p></div>       
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">                
                <input readonly    type="text" id="id" name="id" value="<?php echo $id;?>" />            
                <input type="text" id="nome"   name="nome"   maxlength="35" placeholder="Nome do Produto"  value="<?php echo $nome;?>" required/>
                <input type="text" id="marca" name="marca" maxlength="35" placeholder="marca"         value="<?php echo $marca;?>" required/>                                         
                <input type="text" id="descricao"     name="descricao"     maxlength="200"  placeholder="descricao"             value="<?php echo $descricao;?>" required/>
                <input type="hidden" name="id" value = "<?php echo $id;?>">
                <input type="hidden" name="enviar" value ="S" />                          
            <main>    
            <table>                    
                    <tbody>
                        <tr>                            
                            <td> <button class="btn sm" type="submit" name="alterar" value="Enviar" id="submit">Confirma Alteração?</button></td>                            
                            <td> <button class="btn sm danger" type="reset"  value="Limpar" id="Cancelar">Cancelar</button></td>                                                        
                        </tr>                    
                    </tbody>
                </table>
            </main>
            </form>
        </div>
        </section>

<?php
        mysqli_close($link);      
    }
}
else //alterar
   {
    $id = $_POST["id"];
    $nome= $_POST["nome"];
    $marca = $_POST["marca"];
    $descricao = $_POST["descricao"];

    
    $sql = "UPDATE produtos SET nome_produto = '$nome', marca='$marca',descricao='$descricao'      
    WHERE id = '$id'";    
    

    $res = mysqli_query($link,$sql) or die("Falha na execução de inserção");
    $linhas = mysqli_affected_rows($link);
    if ($linhas==1)
    {        
        echo "<div class='alert_message success'><p> <br>Inclusão Realizada com Sucesso!</p></div>"; 
    }
    elseif ($linhas==0) {
        $erro=mysqli_error($link);
        echo "<div class='alert_message error'><p> <br>Operação não realizada: $erro!!</p></div>";  
    }
    else {
        $erro=mysqli_error($link);
        echo "<div class='alert_message error'><p>ERRO: $erro!!</p></div>";          
     }
    //Fechar a conexao
    mysqli_close($link); 
    }
?>
   <div class="btn1_centro l">     
            <br><br>        
            <a href="AlterarProdutos2.php"  class="btn1">Alterar outro Produto</a> 
            <a href="produtos.php"        class="btn1">Gerenciar Produtos</a>                                          
    </div>

   <!--============================== FIM DA ABERTURA =================================-->

<?php
   include("footer.php");
?>  
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Seu Título</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <!-- Seu conteúdo HTML aqui -->     
</body>
</html>
