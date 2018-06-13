<?php
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');

    if(isset($_POST["enviar"])){

        echo $_POST;
    }

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
            
            <form id="formConfiguracao" style="display:none;" action="{{route('dhcp.send')}}" method="post">
                <table border="1">
                        <tr>
                            <th>Configuração DHCP</th>                           
                        </tr>                        
                            <td>
                                {{csrf_field()}}
                                <label>Rede: </label>
                                <input type="text" name="rede"><br><br>

                                <label>Netmask: </label>
                                <input type="text" name="netmask"><br><br>

                                <label>Broadcast: </label>
                                <input type="text" name="broadcast"><br><br>

                                <label>Range Min: </label>
                                <input type="text" name="rangemin"><br><br>

                                <label>Range Max: </label>
                                <input type="text" name="rangemax"><br><br>
                                
                                <label>default-lease-time: </label>
                                <input type="text" name="dleasetime"><br><br>
                                
                                <label>max-lease-time: </label>
                                <input type="text" name="mleasetime"><br><br>
                                
                                <label>option domain-name-servers: </label>
                                <input type="text" name="domainservers" ><br><br>
                                
                                <label>option domain-name: </label>
                                <input type="text" name="domainname" ><br><br>
                                
                                <label>option routers: </label>
                                <input type="text" name="router"><br><br>
                                
                                <label>interfaces: </label>
                                <input type="text" name="interfaces" ><br><br>
                                <!--exemplo para hint
                                <input type="text" placeholder="enter input" title="Enter input here">
                                -->
                                
                                <input type="submit" value="Enviar" >
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