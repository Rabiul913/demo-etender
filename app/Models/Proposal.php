<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tender;

class Proposal extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tender_id',
        'tender_subject',
        'delivery_date',
        'total_amount',
        'status',
        'file',
    ];
    public function Tender()
    {
        return $this->belongsTo(Tender::class);
    }

}

