<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardStatisticsButton extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'icon',
        'route_url',
        'status',
    ];
}
