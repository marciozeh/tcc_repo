<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DomainController extends Controller
{
    public function index(){
        $lines = file('C:\xampp\htdocs\projeto_tcc\public\domain.txt');
        foreach ($lines as $line) {
            if (strpos($line, "title") !== false) {
                $test = preg_split('/ /', $line, 2);
                $limpa = str_ireplace('"','',$test[1]);

                return view('domain', compact('limpa'));
            }
        }
        return (view('domain'));
    }


        public function send(Request $request)
    {
        $range= $request->input('range');
        $defaultlease= $request->input('default-lease-time');
        $maxlease= $request->input('max-lease-time');
        $authoritative = $request->input('authoritative');
        $domainservers   = $request->input('domain-name-servers');
        $domainname  = $request->input('domain-name');
        $routers = $request->input('routers');
        $interfaces = $request->input('interfaces');




        $write = "$range . $defaultlease . $maxlease . $authoritative . $domainservers . $domainname . $routers . $interfaces";

        $filename = 'C:\xampp\htdocs\projeto_tcc\public\domain.txt';
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


    }
}
