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
                <label for="other">Ativar SQUID</label>
                  <input type="checkbox" id="squid" name="squid" value="ativar">
                  
                  
                </div>    
              
            </form>
            
            <form id="formConfiguracao" style="display:none;" action="{{route('squid.send')}}" method="post">
                <table border="1">
                        <tr>
                            <th>Configuração SQUID</th>                           
                        </tr>                        
                            <td>
                                {{csrf_field()}}
                                <label for="other">Proxy transparente</label>
                                <input type="checkbox" name="proxy" checked="{{$limpa[9]}}"><br><br>

                                <label>Nome: </label>
                                <input type="text" name="name" value="{{$limpa[1]}}"><br><br>

                                <label>Porta: </label>
                                <input type="text" name="port" value="{{$limpa[0]}}"><br><br>

                                <label>Rede: </label>
                                <input type="text" name="rede" value="{{$limpa[2]}}"><br><br>

                                <label>Email: </label>
                                <input type="text" name="email" value="{{$limpa[3]}}"><br><br>

                                <label>cache_mem: </label>
                                <input type="text" name="cachemem" value="{{$limpa[4]}}"><br><br>

                                <label>maximum_object_size_in_memory: </label>
                                <input type="text" name="maxmemory" value="{{$limpa[5]}}"><br><br>

                                <label>maximum_object_size: </label>
                                <input type="text" name="maxobjsize" value="{{$limpa[6]}}"><br><br>

                                <label>minimum_object_size: </label>
                                <input type="text" name="minobjsize" value="{{$limpa[7]}}"><br><br>

                                <label>cache_dir: </label>
                                <input type="text" name="cachedir" value="{{$limpa[8]}}"><br><br>
                                
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