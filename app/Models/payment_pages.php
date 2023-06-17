<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_pages extends Model
{
    use HasFactory;
    protected $table = 'payment_pages';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_book_tickets',
        'Ticket_type',
        'Quantity',
        'Date_of_use',
        'Full_name',
        'Tell',
        'Email','Card_number',
        'Full_name_owner',
        'Expiration_date',
        ' Security_code',

        'qrCodePath',
        'idqrCodePath',
        'qrCode',
        'created_at',
        'updated_at'
    ];
}
