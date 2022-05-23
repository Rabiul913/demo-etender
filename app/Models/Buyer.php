<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'b_name',
        'b_country',
        'b_nid',
        'b_address',
        'b_email',
        'b_phone',
];
}
