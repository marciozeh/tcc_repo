<?php
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');

?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DHCP</title>
        <link href="css/dhcp.css" rel="stylesheet">
        <script type="text/javascript" src="{asset(‘js/scripts.js’) }"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        
        
    </head>
    
    <body>
       
        <main>
            
            <form>
             
                <div>
                <label for="other">Ativar DHCP</label>
                  <input type="checkbox" id="dhcp" name="dhcp" value="ativar">
                  
                  
                </div>    
              
            </form>
            
            <form id="formConfiguracao" style="display:none;">
                <table border="1">
                        <tr>
                            <th>Configuração DHCP</th>                           
                        </tr>                        
                            <td>
                                <label>Range: </label>
                                <input type="text" ><br><br>
                                <label>default-lease-time: </label>
                                <input type="text" ><br><br>
                                <label>max-lease-time: </label>
                                <input type="text" ><br><br>
                                <label>authoritative: </label>
                                <input type="text" ><br><br>
                                <label>option domain-name-servers: </label>
                                <input type="text" ><br><br>
                                <label>option domain-name: </label>
                                <input type="text" ><br><br>
                                <label>option routers: </label>
                                <input type="text" ><br><br>
                                <label>interfaces: </label>
                                <input type="text" ><br><br>
                                <!--exemplo para hint
                                <input type="text" placeholder="enter input" title="Enter input here">
                                -->
                            </td>
                            
                     
                </table>
            </form>
           
        <script>
            
        var ativarDhcp = document.querySelector('input[value="ativar"]');       

        ativarDhcp.onchange = function() {
          if(ativarDhcp.checked) {
            
            document.getElementById("formConfiguracao").style.display='block';
            
          } else {
            
            document.getElementById("formConfiguracao").style.display='none';
          }
        };
            
        </script>
            
        </main>
    </body>
</html>