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
    <br>        <br>   
    <link href="css/consultar.css" type="text/css" rel="stylesheet">

        <h2>Listar Produtos</h2>
        <br>   
        
        <!-- <div class="alert_message error"><p>Acesso Negado!!!</p></div> -->            
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <input type="text" id="nome" name="nome" maxlength="35" placeholder="Nome do Produto ou (T) para Todos"  required/>
            <br>        <br>
            <input type="hidden" name="enviar" value ="S">                     
            
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
<?php }
    else // listar
    {
    $nome = trim($_POST["nome"]);

    if ($nome=='T' ||  $nome == 't') 
    { $comando = "SELECT * FROM produtos";}
    else 
    { 
      $comando = "SELECT * FROM produtos WHERE nome_produto LIKE '%$nome_produto%'"; 
      
    }  
        
    $res = mysqli_query($link,$comando) or die("Falha na execução da consulta");
    ?>

    <section class="dashboard">
    <div class="container dashboard_container_al">          
    <main>  
        <h2></h2> 
        <br>        <br> 
        <div class="btn1_centro">
            <br>
        </div>        
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>Descrição</th>
    
                </tr>
            </thead>
            <tbody>
                <?php
                while ($linha = mysqli_fetch_assoc($res))
                {
                $Nome_produto   = $linha["nome_produto"];
                $Marca = $linha["marca"];
                $Descricao     = $linha["descricao"]; 
                $id  = $linha["id"]; 
            


                ?>
                <tr>
                    <td class="id_conf"> <?php echo $id ?>  </td>
                    <td class="id_dados">  <?php echo $Nome_produto ?> </td>
                    <td class="id_dados">  <?php echo $Marca ?> </td>
                    <td class="id_dados">  <?php echo $Descricao ?> </td>
        
                <?php
                 }
                ?>
                </tr>
            </tbody>
        </table>
    </main>
    </div>
    </section>
    
    <?php

    }

   //Fechar a conexao
   mysqli_close($link);    
    ?>
    <section class="dashboard">
    <div class="container dashboard_container_al">          
    <main>  
        <br>        <br> 
        <div class="btn1_centro">
            <a href="consultarProdutos.php"  class="btn1">Nova Consulta</a> 
            <a href="produtos.php"        class="btn1">Gerenciar Produtos</a>                                          
        </div>        
   <!--============================== FIM DA ABERTURA =================================-->
       
<?php
   include("footer.php");
?>  