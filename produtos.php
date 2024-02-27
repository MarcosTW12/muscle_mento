<?php
    include("nav.php");
?>

    <link rel="stylesheet" type="text/css" href="css/consultar.css">
       <!--============================== END OF NAV =======================================-->
    <section class="dashboard">
        <div class="container dashboard_container">
            <button class="sidebar_toggle" id="show_sidebar-btn"><i class="uil uil-angle-right-b"></i></button>
            <button class="sidebar_toggle" id="hide_sidebar-btn"><i class="uil uil-angle-left-b"></i></button>
            <aside>
            <br>        <br>
            <h2>Gerenciar produtos</h2>
            </aside>
            <main>                
                <table>                    
                    <tbody>
                        <tr>  
                        <br>        <br>                          
                            <td><a href="incluirProdutos2.php"  class="btn sm">Incluir</a></td>
                            <td><a href="AlterarProdutos.php"  class="btn sm">Alterar</a></td>
                            <td><a href="consultarProdutos.php"   class="btn sm">Consultar</a></td>
                            <td><a href="ExcluirProdutos2.php"  class="btn sm danger">Excluir</a></td>                            
                        </tr>                    
                    </tbody>
                </table>
            </main>
        </div>
    </section>
   
           <!--============================== FIM DA ABERTURA =================================-->
<?php
   include("footer.php");
?>   