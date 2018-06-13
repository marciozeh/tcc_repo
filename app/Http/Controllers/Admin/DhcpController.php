<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DhcpController extends Controller
{
    public function index(){
        return (view('dhcp'));
    }

    public function send(Request $request)
    {
        $rangemin = $request->input('rangemin');
        $rangemax = $request->input('rangemax');
        $dleasetime = $request->input('dleasetime');
        $mleasetime = $request->input('mleasetime');
        $domainservers = $request->input('domainservers');
        $domainname = $request->input('domainname');
        $router = $request->input('router');
        $interfaces = $request->input('interfaces');
        $rede = $request->input('rede');
        $netmask = $request->input('netmask');
        $broadcast = $request->input('broadcast');

        if($dleasetime == null){
            $dleasetime = 600;
        }

        if($mleasetime == null){
            $mleasetime = 7200;
        }

        $test = "#Domínio configurado no BIND \r\n".
                "#option domain-name ".$domainname.";\r\n".
                "default-lease-time ". $dleasetime ."; #controla o tempo de renovação do IP\r\n".
                "max-lease-time ".$mleasetime ." #determina o tempo que cada máquina pode usar um determinado IP. \r\n".
                "log-facility local7; \r\n \r\n".
                
                "subnet ".$rede." netmask ".$netmask." { #Define sua sub-rede 192.168.1.0 com a máscara 255.255.255.0 \r\n".
                    "range ".$rangemin." ".$rangemax.";  #faixa de IPs que o cliente pode usar.\r\n".
                     "option routers ".$router."; #Este é o gateway padrão (neste caso).\r\n".
                     "option broadcast-address ".$broadcast." ; #Essa linha é o endereço de broadcast (neste caso).\r\n \r\n".
                
                "#Aqui você coloca os servidores DNS de terceiros ou seu DNS próprio configurado no BIND. Nesse caso coloquei o DNS do Google.\r\n".
                     "option domain-name-servers ".$domainservers."; \r\n".
                    "}\r\n \r\n";

        $filename = 'C:\xampp\htdocs\projeto_tcc\public\test.txt';
        if (is_writable($filename)) {
            if (!$handle = fopen($filename, "w")) {
                return "Cannot open file ($filename)";
                exit;
            }
            if (fwrite($handle, $test) === FALSE) {
                return "Cannot write to file ($filename)";
                exit;
            }
            return "Success, wrote ($test) to file ($filename)";

            fclose($handle);

        } else {
            return "The file $filename is not writable";
        }

        $comando = "dhcpd -cf /etc/dhcpd.conf -d ";
        //comando para iniciar o dhcp
        //shell_exec($comando.$interfaces);
   }
}
