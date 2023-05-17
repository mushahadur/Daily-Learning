<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordContent extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function word_content_order()
    {
        return $this->hasMany(WordContentOrder::class);
    }
}
