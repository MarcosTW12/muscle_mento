<?php
    include("nav.php");
?>
       <!--============================== END OF NAV =======================================-->  
       <?php 
require("conecta.php");
if (!isset($_POST["id"]) && !isset($_POST["enviar"]))
{
    ?>
    <br>
    <section class="form_section">
        <div class="container form_section-container">  
        <link rel="stylesheet" href="css/excluir.css">

            <br>  
            <br>  
            <h2>Excluir Produtos</h2>        
            <!-- <div class="alert_message error"><p>Acesso Negado!!!</p></div> -->            
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <br>
                <input type="text" id="id" name="id" maxlength="3" placeholder="Identificação do Produto ou 000" /> 
            <br>   <br>         
            <main>    
            <table>                    
                <tbody>
                    <tr>
                        <td> <button class="btn sm" type="submit" value="Enviar" id="submit">Prosseguir</button></td>  <br>                          
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
elseif (!isset($_POST["enviar"])) // busca produto 
{
    $id_produto = $_POST["id"];
    if ($id_produto != "000")
    {
      $sql = "select * FROM produtos WHERE id = '$id_produto'";
      $res = mysqli_query($link,$sql) or die("Falha na execução de inserção");    
      if (mysqli_num_rows($res)==0)
      {
        ?>
            <div class="alert_message error"><p>Produto não Localizado no Banco de Dados!</p></div>       
       <?php
      }
      else 
      {        
        
        $registro = mysqli_fetch_row($res); //seta p o registro
        $id_produto = $_POST["id"];

        ?>
        <br> <br>
        <br> 

        <section class="form_section">
        <div class="container form_section-container">                       
            <div class="alert_message1 success"><p>Produto Localizado!</p></div>       
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">                
                <input readonly    type="text" id="id" name="id" value="<?php echo $id_produto;?>" />            
               
                <input type="hidden" name="enviar" value ="S" />                          
            <main>    
            <table>                    
                <tbody>
                    <tr>                            
                        <td> <button class="btn sm danger" type="submit" name="excluir" value="Enviar" id="submit">Confirma Exclusão?</button></td>                                                        
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
    else 
    {
        $nomex = trim($_POST["nomex"]);
    
        if ($nomex=='T' ||  $nomex == 't') 
        { 
            $comando = "SELECT * FROM produtos";
        }
        else 
        { 
          $comando = "SELECT * FROM produtos WHERE id LIKE '%$id_produto%'"; 
          
        }  
            
        $res = mysqli_query($link,$comando) or die("Falha na execução da consulta");
        ?>
    
        <section class="dashboard">
        <div class="container dashboard_container_al">          
        <main>  
            <h2>Produto</h2>              
            <table>
                <thead>
                    <tr>
                    <th>Nome do Produto</th>
                    <th>Marca</th>
                    <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($linha = mysqli_fetch_assoc($res))
                    {
                    $id_produto = $_POST["id"];
                    $nome_produto = $_POST["nome_produto"];
                    $marca =  $_POST["marca"];
                    $descricao = $_POST["descricao"];
                    ?>
                    <tr>
                        <td class="id_dados">  <?php echo $id_produto ?> </td>
                        <td class="id_dados">  <?php echo $nome_produto ?> </td>
                        <td class="id_dados">  <?php echo $marca ?> </td>
                        <td class="id_dados">  <?php echo $descricao ?> </td>
                    <?php
                    }
                    ?>
                    </tr>
                </tbody>
            </table>
        </main>
        </div>
        </section>
        

        <section class="form_section">
        <div class="container form_section-container">                       
            <div class="alert_message1 error"><p>Excluir todos os Registros</p></div>       
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">  
                <input type="hidden" name="id" value = "000">
                <input type="hidden" name="enviar" value ="S" />                          
            <main>    
            <table>                    
                    <tbody>
                        <tr>                            
                            <td> <button class="btn sm danger" type="submit" name="excluir" value="Enviar" id="submit">Confirma Exclusão?</button></td>                                                        
                        </tr>                    
                    </tbody>
                </table>
            </main>
            </form>
        </div>
        </section>


        <?php
        mysqli_close($link); ?> 
    

        <?php
    
    }

}
else //excluir
{
    
    if ($_POST["id"] != "000")
    {          
        $id_produto= $_POST["id"];        
        $sql = "DELETE FROM produtos WHERE id = $id_produto";
        
        $res = mysqli_query($link,$sql) or die("Falha na execução de inserção");
        $linhas = mysqli_affected_rows($link);
        
        if ($linhas==1)
        {
            echo "<div class='alert_message success'><p>Exclusão Realizada com Sucesso!</p></div>"; 
        }
        else 
        {
            $erro=mysqli_error($link);
            echo "<div class='alert_message error'><p>ERRO: $erro!!</p></div>";        
            
        }
    //Fechar a conexao
    mysqli_close($link); 
    }
    else
    {
        
    
        $res = mysqli_query($link,$comando) or die("Falha na execução de inserção");
        $linhas = mysqli_affected_rows($link);
        if ($linhas>=1)
        {
            echo "<div class='alert_message success'><p>Exclusão Realizada com Sucesso!</p></div>"; 
        }
        else 
        {
            $erro=mysqli_error($link);
            echo "<div class='alert_message error'><p>ERRO: $erro!!!</p></div>";                
        }
         
        //Fechar a conexao
        mysqli_close($link);       
    }

}
    ?>
    <div class="btn1_centro">
               <br><br>          
             <a href="excluirProdutos2.php"  class="btn1">Excluir outro Produto</a> 
             <a href="produtos.php"        class="btn1">Gerenciar Produtos</a>                                          
     </div>
  <!--============================== FIM DA ABERTURA =================================-->

<?php
   include("footer.php");
?>  