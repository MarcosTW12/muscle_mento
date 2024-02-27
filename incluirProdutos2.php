Não é possível criar, editar ou fazer upload de arquivos … Você não tem armazenamento suficiente para criar, editar e fazer upload de arquivos. Aproveite 100 GB de armazenamento por R$ 6,99 R$ 1,69 por mês, durante 3 meses.
<?php
    include("nav.php");
?>
       <!--============================== END OF NAV =======================================--> 
<?php 
require("conecta.php");
if (!isset($_POST["enviar"]))
{
?>
<section class="form_section">
    <div class="container form_section-container"> 
    <br>
    <link href="css/incluir.css" type="text/css" rel="stylesheet">

        <br> 
        <h2>Adicionar Produtos</h2>
        <br>
        <!-- <div class="alert_message error"><p>Acesso Negado!!!</p></div> -->        
           
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <input type="text" id="nome_produto" name="nome_produto" maxlength="35" placeholder="Nome do Produto"  required/> <br> <br>
            <input type="text" id="marca" name="marca" maxlength="35" placeholder="Marca do Produto" required/> <br> <br>
            <input type="text" id="descricao" name="descricao" maxlength="35" placeholder="Descrição" required/> <br> <br>

            <input type="hidden" name="enviar" value ="S">         
            <main>    
            <table>                    
                    <tbody>
                        <tr>                            
                            <td> <button class="btn sm" type="submit" value="Enviar" id="submit">Adicionar Produto</button></td>                            
                            <td> <button class="btn sm danger" type="reset"  value="Limpar" id="Cancelar">Cancelar</button></td>                                                        
                        </tr>                    
                    </tbody>
                </table>
            </main>
            </form>
        </div>
        </section>   
<?php }
    else // incluir
    {
        
    if ($link) 
    {
    $id_produto = $_POST["id_produto"];
    $nome_produto = $_POST["nome_produto"];
    $marca=  $_POST["marca"];
    $descricao = $_POST["descricao"];
     
     $sql= "INSERT INTO produtos (id, nome_produto, marca, descricao) VALUES (null, '$nome_produto', '$marca', '$descricao' )";

     $res = mysqli_query($link,$sql) or die("Falha na execução de inserção");
     if ($res) {               
           
            echo "<div class='alert_message success'><p> <br>Inclusão Realizada com Sucesso!</p></div>"; }
     
     else {
        $erro=mysqli_error($link);
        echo "<div class='alert_message error'><p>ERRO: $erro!</p></div>";        
     }
    }}
    //Fechar a conexao
    mysqli_close($link);    
    ?>
   <div class="btn1_centro l">
            
                                             
    </div>

     

   <!--============================== FIM DA ABERTURA =================================-->
       
<?php
    include("footer.php");
?>