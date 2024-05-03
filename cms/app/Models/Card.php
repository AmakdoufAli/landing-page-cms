<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'id_section', 'card_order', 'image', 'title', 'description', 'background'
    ];

    // protected $casts = [
    //     'title' => 'json',
    //     'description' => 'json',
    // ];

    public function getDescriptionAttribute($value)
    {
        $descriptionArray = json_decode($value, true);

        if (!is_array($descriptionArray) || empty($descriptionArray)) {
            return '';
        }

        $formattedDescription = [];

        foreach ($descriptionArray as $lang => $description) {
            $sentences = explode(';', $description);

            $formattedSentences = array_map(function ($sentence) {
                return trim($sentence);
            }, $sentences);

            $formattedDescription[$lang] = implode("\n", $formattedSentences);
        }

        return $formattedDescription;
    }





}
