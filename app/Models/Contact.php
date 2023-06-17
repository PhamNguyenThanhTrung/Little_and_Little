<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'contact';
    protected $fillable = [
        'id',
        'Full_name',
        'Tell',
        'Email',
        'Address',
        'message',
    ];
}
