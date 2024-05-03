<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactNotification extends Model
{
    use HasFactory;

    protected $table = 'contact_notifications';

    protected $fillable = [
        'subject', 'nom', 'email', 'telephone', 'message', 'status'
    ];

}
