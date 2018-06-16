<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FirewallController extends Controller
{
    public function index(){
        return view('firewall');
    }

    public function send(Request $request){

    }
}
