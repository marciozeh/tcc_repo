<?php

namespace App\Http\Controllers\Admin;

use App\Firewall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FirewallController extends Controller
{
    public function index(){
        //como listar por regra
        for($i = 1; $i < 12; $i++) {
            $search[] = Firewall::select('comand', 'active', 'rule')
                ->where('rule',$i)
                ->first();
        }
        //return $search;
        return view('firewall', compact('search'));
    }


    public function send(Request $request){

        $redirecionamento   = $request -> input('redirecionamento');
        $fluxoInterno       = $request -> input('fluxoInterno');
        $habPortas          = $request -> input('habPortas');
        $blacklist          = $request -> input('blacklist');
        $deathPing          = $request -> input('deathPing');
        $synFlood           = $request -> input('synFlood');
        $sshForce           = $request -> input('sshForce');
        $blockPorts         = $request -> input('blockPorts');
        $spoofing           = $request -> input('spoofing');
        $shealtScan         = $request -> input('shealtScan');
        $maskNet            = $request -> input('maskNet');
        $portblo  = $request -> input('portblo');
        $sites  = $request -> input('sites');
        $portlib  = $request -> input('portlib');

        if($redirecionamento == 'on'){
            $firewallData[] = $redirecionamento;
        }else{
            $firewallData[] = 'off';
        }

        if($fluxoInterno == 'on'){
            $firewallData[] = $fluxoInterno;
        }else{
            $firewallData[] = 'off';
        }

        if($habPortas == 'on'){
            $firewallData[] = $habPortas;
        }else{
            $firewallData[] = 'off';
        }

        if($blacklist == 'on'){
            $firewallData[] = $blacklist;
        }else{
            $firewallData[] = 'off';
        }

        if($deathPing == 'on'){
            $firewallData[] = $deathPing;
        }else{
            $firewallData[] = 'off';
        }

        if($synFlood == 'on'){
            $firewallData[] = $synFlood;
            $synFlood == 'off';
        }else{
            $firewallData[] = 'off';
        }

        if($sshForce == 'on'){
            $firewallData[] = $sshForce;
        }else{
            $firewallData[] = 'off';
        }

        if($blockPorts == 'on'){
            $firewallData[] = $blockPorts;
        }else{
            $firewallData[] = 'off';
        }

        if($spoofing == 'on'){
            $firewallData[] = $spoofing;
        }else{
            $firewallData[] = 'off';
        }

        if($shealtScan == 'on'){
            $firewallData[] = $shealtScan;
        }else{
            $firewallData[] = 'off';
        }

        if($maskNet == 'on'){
            $firewallData[] = $maskNet;
        }else{
            $firewallData[] = 'off';
        }

        for ($i = 0; $i < count($firewallData); $i ++){
            if($firewallData[$i] == "on"){
                Firewall::where('rule',($i+1))
                 ->update(['active' => "on"]);
            }else{
                Firewall::where('rule',($i+1))
                    ->update(['active' => "off"]);
            }
        }

        $array = Firewall::where('active',"on")
            ->pluck('comand')
            ->toArray();


        $filename = 'C:\xampp\htdocs\projeto_tcc\public\firewall.txt';
        if (is_writable($filename)) {
            if (!$handle = fopen($filename, "w")) {
                return "Cannot open file ($filename)";
                exit;
            }
            $fim = '';
            // insere o valor do array com quebra de linha!
            foreach ($array as $teste => $value){
                $fim .= ($value.PHP_EOL);
            }
            if (fwrite($handle, $fim) === FALSE) {
                return "Cannot write to file ($filename)";
                exit;
            }
//            return "Success, wrote ($write1) to file ($filename)";

            fclose($handle);

        } else {
            return "The file $filename is not writable";
        }


        for($o = 1; $o < 12; $o++) {
            $search[] = Firewall::where('rule',$o)
                ->select('comand','rule','active')
                ->first();
        }

        echo "Atualizado com sucesso";
        return view('firewall', compact('search'));
//        dd($search) ;
    }


}
