<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'Name_Event',
        'price',
        'message',
        'Image',
        'Start_date',
        'Expiration_date'
    ];
}
