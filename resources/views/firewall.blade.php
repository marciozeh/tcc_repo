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
            <div>
                <form id="formConfiguracao"  action="{{route('firewall.send')}}" method="post">
                    <table border="1">
                            <tr>
                                <th>Configuração Firewall</th>
                            </tr>
                                <td>
                                    {{csrf_field()}}

                                    <label for="other">Regras Firewall</label>
                                    <input type="checkbox" id="firewall" name="firewall" checked=""><br><br>

                                    <label for="other">Ativar o Redirecionamento</label>
                                    <input type="checkbox" name="redirecionamento"  @php if($search[0]['active'] == 'on') {echo "checked";}  @endphp><br><br>

                                    <label for="other">Ativar o Fluxo Interno</label>
                                    <input type="checkbox" name="fluxoInterno" @php if($search[1]['active'] == 'on') {echo "checked";}  @endphp><br><br>

                                    <label for="other">Habilitando Portas da Lista</label>
                                    <input type="checkbox" name="habPortas" @php if($search[2]['active'] == 'on') {echo "checked";}  @endphp><br><br>

                                    <label for="other">Ativar o Bloqueio de Sites na Lista</label>
                                    <input type="checkbox" name="blacklist" @php if($search[3]['active'] == 'on') {echo "checked";}  @endphp><br><br>

                                    <label for="other">Bloqueio Death Ping</label>
                                    <input type="checkbox" name="deathPing" @php if($search[4]['active'] == 'on') {echo "checked";}  @endphp><br><br>

                                    <label for="other">Bloqueio SYN FLOOD</label>
                                    <input type="checkbox" name="synFlood" @php if($search[5]['active'] == 'on') {echo "checked";}  @endphp><br><br>

                                    <label for="other">Bloqueio SSH Força Bruta</label>
                                    <input type="checkbox" name="sshForce" @php if($search[6]['active'] == 'on') {echo "checked";}  @endphp><br><br>

                                    <label for="other">Bloqueio de Portas na Lista</label>
                                    <input type="checkbox" name="blockPorts" @php if($search[7]['active'] == 'on') {echo "checked";}  @endphp><br><br>

                                    <label for="other">Bloqueio Anti-Spoofing</label>
                                    <input type="checkbox" name="spoofing" @php if($search[8]['active'] == 'on') {echo "checked";}  @endphp><br><br>

                                    <label for="other">Bloqueio Shealt Scan</label>
                                    <input type="checkbox" name="shealtScan" @php if($search[9]['active'] == 'on') {echo "checked";}  @endphp><br><br>

                                    <label for="other">Ativar o Mascaramento da Rede</label>
                                    <input type="checkbox" name="maskNet" @php if($search[10]['active'] == 'on') {echo "checked";}  @endphp><br><br>



                                    <!--exemplo para hint
                                    <input type="text" placeholder="enter input" title="Enter input here">
                                    -->

                                    <input type="submit" value="Enviar" >
                                </td>


                    </table>
                </form>
            </div>
            
        </main>
    </body>
</html>