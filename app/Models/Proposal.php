<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tender;
use App\Models\Tender_type;

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
        'bank_solvency',
        'audit_report',
    ];

    public function Tender()
    {
        return $this->belongsTo(Tender::class);
    }


    public function Tender_type()
    {
        return $this->belongsTo(Tender_type::class);
    }
}
