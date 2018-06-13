<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SquidController extends Controller
{
    public function index(){

        $lines = file('C:\xampp\htdocs\projeto_tcc\public\squid.txt');
        $pesquisas = ['http_port', 'visible_hostname', 'acl redelocal src', 'cache_mgr','cache_mem', 'maximum_object_size_in_memory',
            'maximum_object_size', 'minimum_object_size', 'cache_dir ufs /var/spool/squid', 'transparent'];
        foreach ($pesquisas as $pesquisa) {
            foreach ($lines as $line) {
                if (strpos($line, $pesquisa) !== false) {

                    if($pesquisa == 'acl redelocal src' || $pesquisa == 'cache_dir ufs /var/spool/squid'){
                        $test = preg_split('/ /', $line, 5);
                        $limpa[] = str_ireplace('"', '', $test[3]);
                    }else {
                        if($pesquisa == 'transparent'){
                            $limpa[] = 'on';
                        }else {
                            $test = preg_split('/ /', $line, 5);
                            $limpa[] = str_ireplace('"', '', $test[1]);
                        }
                    }
                }
            }
        }
        // problema com o maximum_object_size pegando o valor do in_memory, procurar como tratar problema.
        if($limpa[9] == null){
            $limpa[9] = 'off';
        }
        return view('squid', compact('limpa'));
        //return $limpa;
    }

    public function send(Request $request)
    {
        $port       = $request->input('port');
        $name       = $request->input('name');
        $rede       = $request->input('rede');
        $email       = $request->input('email');
        $cachemem   = $request->input('cachemem');
        $maxmemory  = $request->input('maxmemory');
        $maxobjsize = $request->input('maxobjsize');
        $minobjsize = $request->input('minobjsize');
        $cachedir   = $request->input('cachedir');
        $proxy      = $request->input('proxy');


        if($port == null){
            $port = 3128;
        }

        if($proxy == "on"){
            $proxy = "transparent";
        }else{
            $proxy ="";
        }


        $write =
                "http_port " . $port ." ".$proxy."\r\n".
                "visible_hostname ". $name ."\r\n \r\n".

                "acl all src 0.0.0.0/0.0.0.0 \r\n".
                "acl manager proto cache_object \r\n".
                "acl localhost src 127.0.0.1/255.255.255.255 \r\n".
                "acl SSL_ports port 443 563 \r\n".
                "acl Safe_ports port 21 80 443 563 70 210 280 488 59 777 901 1025-65535 \r\n".
                "acl purge method PURGE \r\n".
                "acl CONNECT method CONNECT \r\n \r\n".

                "http_access allow manager localhost \r\n".
                "http_access deny manager \r\n".
                "http_access allow purge localhost \r\n".
                "http_access deny purge \r\n".
                "http_access deny !Safe_ports \r\n".
                "http_access deny CONNECT !SSL_ports \r\n \r\n".

                "acl redelocal src ". $rede ."\r\n \r\n".

                "http_access allow localhost \r\n".
                "http_access allow redelocal \r\n".
                "http_access deny all \r\n \r\n".

                "hierarchy_stoplist CGI-bin ? \r\n".
                "error_directory /usr/share/squid/errors/Portuguese \r\n".
                "cache_mgr ".$email." \r\n".
                "acl QUERY urlpath_regex cgi-bin ? \r\n".
                "no_cache deny QUERY \r\n \r\n".

                "cache_mem ". $cachemem . " MB \r\n".
                "maximum_object_size_in_memory ". $maxmemory . " KB \r\n".
                "maximum_object_size ". $maxobjsize ." MB \r\n".
                "minimum_object_size ". $minobjsize ." KB \r\n \r\n".
                "cache_swap_low 90 \r\n".
                "ache_swap_high 95 \r\n \r\n".
                "cache_dir ufs /var/spool/squid " . $cachedir ." " . "16 256 \r\n".
                "cache_access_log /var/log/squid/access.log \r\n \r\n".
                "refresh_pattern ^ftp: 15 20% 2280 \r\n".
                "refresh_pattern ^gopher: 15 0% 2280 \r\n".
                "refresh_pattern . 15 20% 2280 \r\n \r\n";



        $filename = 'C:\xampp\htdocs\projeto_tcc\public\squid.txt';
        if (is_writable($filename)) {
            if (!$handle = fopen($filename, "w")) {
                return "Cannot open file ($filename)";
                exit;
            }
            if (fwrite($handle, $write) === FALSE) {
                return "Cannot write to file ($filename)";
                exit;
            }
            return "Success, wrote ($write) to file ($filename)";

            fclose($handle);

        } else {
            return "The file $filename is not writable";
        }

        $comando0 = "iptables -t nat -A PREROUTING -i eth0 -p tcp --dport 80 -j REDIRECT --to-port ".$port.";";
        $comando1 = "/etc/init.d/squid restart";
        //comando para colocar o trafego para a porta monitorada e reiniciar o squid
        //shell_exec($comando0);
        //shell_exec($comando1);
    }
}
