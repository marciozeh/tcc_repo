<?php
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');

?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Máquinas na Rede</title>
        <link href="css/produtos.css" rel="stylesheet">
        
        
    </head>

    <body>
       
        <main>  
            <div id="listagem_produtos"> 
            
          
            <?php
            $arquivo = fopen(storage_path('testearp.txt'),"r");        
            
            $i = 0;
            //foreach ($arquivo as $linha)
            while(!feof($arquivo))
            {
                $i = $i + 1;
                $linha = fgets($arquivo,4096);
                
               
                $teste2 = preg_split("/ /", $linha, -1, PREG_SPLIT_NO_EMPTY);
                $teste2 = str_replace("(", "", $teste2);
                $teste2 = str_replace(")", "", $teste2);
                
                
                
                
            ?>
                <ul>
                    <li class=imagem> 
                         <img src="storage/pc.png"/>
                        <?php
                echo "</br>" . "IP: " . $teste2[1] ."</br> ". "MAC: " . $teste2[3] 
               //echo $ip;
                        ?>
                                   </li>
                    
                </ul>
             <?php
                }
            fclose($arquivo);
            ?>   
            </div>
        </main>       
    </body>
</html>