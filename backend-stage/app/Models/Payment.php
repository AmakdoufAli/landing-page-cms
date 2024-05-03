<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'id_client', 'id_formation', 'paymentID', 'status', 'amount_value','amount_currency_code', 'paymentSource','generatedUrl'
    ];

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'id_client');
    }

    public function landingPage()
    {
        return $this->hasOne(LandingPage::class, 'id', 'id_formation');
    }

}
