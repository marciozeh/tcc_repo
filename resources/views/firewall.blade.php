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
        <title>SQUID</title>
        <link href="css/dhcp.css" rel="stylesheet">
        <script type="text/javascript" src="{asset(‘js/scripts.js’) }"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        
        
    </head>
    
    <body>
       
        <main>
            
            <form>
             
                <div>
                <label for="other">Regras Firewall</label>
                  <input type="checkbox" id="squid" name="squid" value="ativar">
                  
                  
                </div>    
              
            </form>
            
            <form id="formConfiguracao" style="display:none;" action="{{route('firewall.send')}}" method="post">
                <table border="1">
                        <tr>
                            <th>Configuração Firewall</th>
                        </tr>                        
                            <td>
                                {{csrf_field()}}
                                <label for="other">Ativar o Redirecionamento</label>
                                <input type="checkbox" name="redirecionamento" checked=""><br><br>

                                <label for="other">Ativar o Fluxo Interno</label>
                                <input type="checkbox" name="fluxoInterno" checked=""><br><br>

                                <label for="other">Habilitando Portas da Lista</label>
                                <input type="checkbox" name="habPortas" checked=""><br><br>

                                <label for="other">Ativar o Bloqueio de Sites na Lista</label>
                                <input type="checkbox" name="blacklist" checked=""><br><br>

                                <label for="other">Bloqueio Death Ping</label>
                                <input type="checkbox" name="deathPing" checked=""><br><br>

                                <label for="other">Bloqueio SYN FLOOD</label>
                                <input type="checkbox" name="synFlood" checked=""><br><br>

                                <label for="other">Bloqueio SSH Força Bruta</label>
                                <input type="checkbox" name="sshForce" checked=""><br><br>

                                <label for="other">Bloqueio de Portas na Lista</label>
                                <input type="checkbox" name="blockPorts" checked=""><br><br>

                                <label for="other">Bloqueio Anti-Spoofing</label>
                                <input type="checkbox" name="spoofing" checked=""><br><br>

                                <label for="other">Bloqueio Shealt Scan</label>
                                <input type="checkbox" name="shealtScan" checked=""><br><br>

                                <label for="other">Ativar o Mascaramento da Rede</label>
                                <input type="checkbox" name="maskNet" checked=""><br><br>


                                
                                <!--exemplo para hint
                                <input type="text" placeholder="enter input" title="Enter input here">
                                -->

                                <input type="submit" value="Enviar" >
                            </td>
                            
                     
                </table>
            </form>
           
        <script>
            
        var ativarSquid = document.querySelector('input[value="ativar"]');       

        ativarSquid.onchange = function() {
          if(ativarSquid.checked) {
            
            document.getElementById("formConfiguracao").style.display='block';
            
          } else {
            
            document.getElementById("formConfiguracao").style.display='none';
          }
        };
            
        </script>
            
        </main>
    </body>
</html>