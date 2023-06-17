<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_tickets extends Model
{
    use HasFactory;
    protected $table = 'book_tickets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'Ticket_type',
        'Quantity',
        'Date_of_use',
        'Full_name',
        'Tell',
        'Email',
        'created_at',
        'updated_at'
    ];
}
