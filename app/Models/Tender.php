<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proposal;
// use App\Models\Tender_type;

class Tender extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [

        'subject','tender_type_id','create_date','publish_date','detail','deadline','file',

    ];

    public function Proposal()
    {
        return $this->hasMany(Proposal::class);
    }

 
}
