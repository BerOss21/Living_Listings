<?php

namespace App\Traits\Models\Listing;

use App\Models\Scopes\ListingWasNotSoldScope;
use Illuminate\Database\Eloquent\Builder;

trait ListingScopes
{
    public function scopeFilter(Builder $query, $filters)
    {
        $query->when(($filters['price_from'] ?? null),fn($q,$value)=>$q->where('price','>=',$value))
            ->when($filters['price_to'] ?? null ,fn($q,$value)=>$q->where('price','<=',$value))
            ->when($filters['area_from'] ?? null ,fn($q,$value)=>$q->where('area','>=',$value))
            ->when($filters['area_to'] ?? null ,fn($q,$value)=>$q->where('area','<=',$value))
            ->when($filters['beds'] ?? null ,fn($q,$value)=>$q->where('beds',(int)$value<6?'=':'>',(int) $value))
            ->when($filters['baths'] ?? null ,fn($q,$value)=>$q->where('baths',(int)$value<6?'=':'>',(int) $value))
            ->when($filters['deleted'] ?? null ,fn($q)=>$q->withTrashed());      
    }

    public function scopeSort(Builder $query, ?array $sort)
    {
        if(!$sort) return $query;

        foreach($sort as $key=>$item)
        {
            $query->when($item,fn($q)=>$q->orderBy($key,$item));
        }
    }
}