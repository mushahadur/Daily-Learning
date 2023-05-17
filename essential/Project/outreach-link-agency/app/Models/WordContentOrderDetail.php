<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordContentOrderDetail extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'word_content_order_id',
        'topic',
        'anchor_text',
        'landing_page',
        'instruction',
    ];

    public function word_content_order()
    {
        return $this->belongsTo(WordContentOrder::class);
    }
}
