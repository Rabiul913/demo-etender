<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tender;

class Tender_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];


    public function Proposal()
    {
        return $this->hasMany(Tender::class);
    }
}
