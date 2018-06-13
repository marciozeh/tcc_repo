<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DomainController extends Controller
{
    public function index(){
        $lines = file('C:\xampp\htdocs\projeto_tcc\public\sarg.txt');
        foreach ($lines as $line) {
            if (strpos($line, "title") !== false) {
                $test = preg_split('/ /', $line, 2);
                $limpa = str_ireplace('"','',$test[1]);

                return view('sarg', compact('limpa'));
            }
        }
        return (view('sarg'));
    }

    public function send(Request $request)
    {
        $nome = $request->input('name');

    }
}
