<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $casts = [
      'id' => 'integer',
      'driver_id' => 'integer',
      'created_at' => 'datetime',
      'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'id',
        'driver_id',
        'pickup',
        'dropoff',
        'created_at',
        'updated_at',
    ];
}
