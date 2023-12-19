<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Traits\Models\Listing\ListingScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;

class Listing extends Model implements HasMedia
{
    use HasFactory,ListingScopes,SoftDeletes,InteractsWithMedia;

    protected $fillable=['beds','baths','area','city','code','street','street_nr','price','sold_at'];

    protected $casts=[
        'created_at'=>'datetime:d-m-Y',
        'sold_at'=>'datetime:d-m-Y'
    ];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function bidders() :BelongsToMany
    {
        return $this->belongsToMany(User::class,'offers','listing_id','bidder_id')
                    ->as('offer')
                    ->using(Offer::class)
                    ->withPivot('amount','accepted_at','rejected_at')
                    ->withTimestamps();
    }

    public function offers() :HasMany
    {
        return $this->hasMany(Offer::class);
    }
}
