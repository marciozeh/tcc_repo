<?php
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');

?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Regras</title>
        <link href="css/produtos.css" rel="stylesheet">
        <script type="text/javascript" src="{asset(‘js/scripts.js’) }"></script>
        
        
    </head>
    
    <body>
       
        <main>  
            <div > 
                <h1>Crie sua Regra Padrão:</h1>
                
                 <script>
                    function mostrar_form(id) {
                        
                        document.getElementById(id).style.display=('block');
                    }
                </script>
                <script>
                    function ocultar(id){
                        document.getElementById(id).style.display=('none');
                    }
                </script>
                
                <script>
                    function mostrar_dados(dados){
                        document.getElementById(dados).style.display=('block');
                    }
                </script>
                
                <script>
                    function mostrar_acao(acao,valor){
                        document.getElementById(acao).style.display=('block');
                        
                        
                        
                        if (valor == 'INPUT'){
                            document.getElementById("btni").style.display='block';
                            document.getElementById("btno").style.display='none';
                            document.getElementById("btnp").style.display='none';
                            document.getElementById("btns").style.display='none';
                            document.getElementById("btnd").style.display='none';
                            document.getElementById("btnsp").style.display='none';
                            document.getElementById("btndp").style.display='none';
                        }
                        
                        if (valor == 'OUTPUT'){
                            document.getElementById("btni").style.visibility='hidden';
                            document.getElementById("btno").style.visibility='visible';
                            document.getElementById("btnp").style.visibility='hidden';
                            document.getElementById("btns").style.visibility='hidden';
                            document.getElementById("btnd").style.visibility='hidden';
                            document.getElementById("btnsp").style.visibility='hidden';
                            document.getElementById("btndp").style.visibility='hidden';
                        }
                        
                        if (valor == 'FORWARD'){
                            document.getElementById("btni").style.display='block';
                            document.getElementById("btno").style.display='block';
                            document.getElementById("btnp").style.display='none';
                            document.getElementById("btns").style.display='none';
                            document.getElementById("btnd").style.display='none';
                            document.getElementById("btnsp").style.display='none';
                            document.getElementById("btndp").style.display='none';
                        }
                    }
                </script>
                
                <form id="form_tipo">
                    <table border="1">
                        <tr>
                            <th>Tabela</th>                           
                        </tr>
                        <tr>
                            <td><button type="button" onclick="mostrar_form('form_filter'); ocultar('form_tipo');" value="FILTER">FILTER</button> <label> * Tabela padrão, usada no tráfego de dados, identificar e tratar os pacotes de dados</label><br><br>
                                <button type="button" onclick="mostrar_form('form_nat'); ocultar('form_tipo');" value="NAT">NAT </button><label> * Tabela usada para alterar o IP e/ou Portas destino</label><br><br>
                                <button type="button" onclick="mostrar_form('form_mangle'); ocultar('form_tipo');" value="MANGLE">MANGLE</button><label> * Tabela para alterar os pacotes</label><br><br>
                            </td>
                            
                     
                    </table>
                </form>   
                
                <form id="form_filter"  style="display:none;">
                    <table border="1">
                        <tr>FILTER</tr>
                        <td>   
                            <button id="INPUT" type="button" onclick="mostrar_acao('form_acoes','INPUT');" value="INPUT">INPUT </button>
                            <button id="OUTPUT" type="button" onclick="mostrar_acao('form_acoes','OUTPUT');" value="OUTPUT">OUTPUT </button>
                            <button id="FORWARD" type="button" onclick="mostrar_acao('form_acoes','FORWARD');" value="FORWARD">FORWARD </button>
                        </td>
                    </table>
                </form>
                
                <form id="form_nat"  style="display:none;">
                    <table border="1">
                        <tr>NAT</tr>
                        <td>   
                            <button id="botao" type="button" onclick="mostrar_acao('form_acoes','PREROUTING');" value="PREROUTING">PREROUTING </button>
                            <button id="botao" type="button" onclick="mostrar_acao('form_acoes','POSTROUTING');" value="POSTROUTING">POSTROUTING </button>
                            <button id="botao" type="button" onclick="mostrar_acao('form_acoes','OUTPUT');" value="OUTPUT">OUTPUT </button>
                        </td>
                    </table>
                </form>
                
                <form id="form_mangle"  style="display:none;">
                    <table border="1">
                        <tr>MANGLE</tr>
                            <td>
                                <button id="botao" type="button" onclick="mostrar_acao('form_acoes','PREROUTING');" value="">PREROUTING </button>                               
                                <button id="botao" type="button" onclick="mostrar_acao('form_acoes','OUTPUT');" value="">OUTPUT </button>
                             </td>
                    </table>
                </form>
                
                 <form id="form_acoes"  style="display:none;">
                   <table border="1">
                       <tr>Dados</tr>
                            <td>
                                <button id="btni" type="button" onclick="mostrar_dados('form_dados');" value="" >-i </button>    
                                <button id="btno" type="button" onclick="mostrar_dados('form_dados');" value="" >-o </button>
                                <button id="btnp" type="button" onclick="mostrar_dados('form_dados');" value="" >-p </button>
                                <button id="btns" type="button" onclick="mostrar_dados('form_dados');" value="" >-s </button>
                                <button id="btnd" type="button" onclick="mostrar_dados('form_dados');" value="" >-d </button>
                                <button id="btnsp" type="button" onclick="mostrar_dados('form_dados');" value="" >--sport </button>
                                <button id="btndp" type="button" onclick="mostrar_dados('form_dados');" value="" onchange="" >--dport </button>
                                
                            </td>
                    </table>
                </form>
                <form id="form_acao"  style="display:none;">
                    <table border="1">
                        <tr>Ação</tr>
                        <td>
                            <input type="checkbox" name="vehicle" value="Bike">ACCEPT <br>
                            <input type="checkbox" name="vehicle" value="Bike">DROP <br>
                            <input type="checkbox" name="vehicle" value="Bike">REJECT <br>
                            <button type="button" onclick="" value="NAT">SALVAR </button>
                        </td>
                    </table>
                </form>

            </div>
        </main>       
    </body>
</html>