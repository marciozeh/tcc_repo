<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firewall extends Model
{
    protected $fillable = [
        'comand', 'active', 'rule'
    ];

    protected $table = 'firewalls';


}
