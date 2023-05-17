<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUS extends Model
{
    use HasFactory, HasUuids;


    protected $table = "contact_us";
    protected $fillable = [
        'id',
        'subject',
        'message',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reply(){
        return $this->hasMany(ReplyContactUS::class,'message_id');
    }
}
