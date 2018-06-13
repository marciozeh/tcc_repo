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
                <label for="other">Ativar Dominio</label>
                  <input type="checkbox" id="dhcp" name="dhcp" value="ativar">
                  
                  
                </div>    
              
            </form>
            
            <form id="formConfiguracao" style="display:none;" action="{{route('domain.send')}}" method="post">
                <table border="1">
                        <tr>
                            <th>Configuração Dominio</th>
                        </tr>                        
                            <td>
                                {{csrf_field()}}
                                <label>Range: </label>
                                <input type="text" name="range"><br><br>
                                <label>default-lease-time: </label>
                                <input type="text" name="default-lease-time" ><br><br>
                                <label>max-lease-time: </label>
                                <input type="text" name="max-lease-time"><br><br>
                                <label>authoritative: </label>
                                <input type="text" name="authoritative"><br><br>
                                <label>option domain-name-servers: </label>
                                <input type="text" name="domain-name-servers"><br><br>
                                <label>option domain-name: </label>
                                <input type="text" name="domain-name"><br><br>
                                <label>option routers: </label>
                                <input type="text" name="routers"><br><br>
                                <label>interfaces: </label>
                                <input type="text" name="interfaces"><br><br>
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