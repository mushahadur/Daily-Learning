<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function exploreSites()
    {
        return $this->belongsToMany(ExploreSite::class);
    }

    public function exploreServiceOrder()
    {
        return $this->hasMany(ExploreServiceOrder::class);
    }
}
