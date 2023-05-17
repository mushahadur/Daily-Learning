<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExplorePublicationType extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['name'];

    public function explore_site()
    {
        return $this->hasMany(ExploreSite::class, 'explore_publication_type_id');
    }
}
