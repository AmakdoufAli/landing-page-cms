<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'prenom', 'nom', 'email', 'password', 'ville','telephone'
    ];

}