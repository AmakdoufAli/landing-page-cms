<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $fillable = [
        'name', 'link', 'price', 'title', 'description','image'
    ];

    public function sections()
    {
        return $this->hasMany(Section::class, 'id_landing_page');
    }

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
    ];
}
