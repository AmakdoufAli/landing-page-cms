<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'id_landing_page', 'section_name', 'section_order', 'title', 'subtitle1',
        'subtitle2','description', 'article_photo', 'background_image'
    ];

    public function cards()
    {
        return $this->hasMany(Card::class, 'id_section');
    }

    protected $casts = [
        'title' => 'json',
        'subtitle1' => 'json',
        'subtitle2' => 'json',
        'description' => 'json',
    ];

}
