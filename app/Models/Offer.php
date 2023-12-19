<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Pivot
{
    use HasFactory;

    protected $appends=['state'];

    protected $table="offers";

    public $incrementing = true;

    protected $fillable=['amount','rejected_at','accepted_at','bidder_id','listing_id'];

    protected $casts=[
        'created_at'=>'datetime:d-m-Y',
        'accepted_at'=>'datetime:d-m-Y',
        'rejected_at'=>'datetime:d-m-Y',
    ];

    public function listing() :BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    public function bidder() :BelongsTo
    {
        return $this->belongsTo(User::class,"bidder_id","id");
    }

    public function getStateAttribute()
    {
       $value=match(true){
            !($this->rejected_at || $this->accepted_at) =>'pending',
            (bool) $this->rejected_at=>'rejected',
            (bool) $this->accepted_at=>'accepted'
       };

       return $value;
    }
}
