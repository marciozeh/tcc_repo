<?php
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');

?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SARG</title>
        <link href="css/dhcp.css" rel="stylesheet">
        <script type="text/javascript" src="{asset(‘js/scripts.js’) }"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        
        
    </head>
    
    <body>
       
        <main>
            
            <form>
             
                <div>
                <label for="other">Ativar SARG</label>
                  <input type="checkbox" id="sarg" name="sarg" value="ativar">
                  
                  
                </div>    

            </form>
            
            <form id="formConfiguracao" style="display:none;" action="{{route('sarg.send')}}" method="post">
                <table border="1">
                        <tr>
                            <th>Configuração SARG</th>                           
                        </tr>                        
                            <td>
                                {{csrf_field()}}
                                <label>Nome: </label>
                                <input type="text" name="name" value="{{$limpa}}"><br><br>
                                <!--exemplo para hint
                                <input type="text" placeholder="enter input" title="Enter input here">
                                -->
                                <input type="submit" value="Enviar" >
                            </td>

                     
                </table>
            </form>
           
        <script>
            
        var ativarSarg = document.querySelector('input[value="ativar"]');       

        ativarSarg.onchange = function() {
          if(ativarSarg.checked) {
            
            document.getElementById("formConfiguracao").style.display='block';
            
          } else {
            
            document.getElementById("formConfiguracao").style.display='none';
          }
        };
            
        </script>
            
        </main>
    </body>
</html>