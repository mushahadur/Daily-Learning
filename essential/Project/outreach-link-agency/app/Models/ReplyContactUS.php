<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyContactUS extends Model
{
    use HasFactory, HasUuids;


    protected $table = "reply_contact_u_s";
    protected $fillable = [
        'id',
        'message_id',
        'user_id',
        'reply',
    ];

    public function contactUS(){
        return $this->belongsTo(ContactUS::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
