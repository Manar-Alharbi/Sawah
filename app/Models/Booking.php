<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trip_id',
        'message',
        'status',
        'phone',
        'notes',
    ];

   public function trip()
{
    return $this->belongsTo(\App\Models\Trip::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
}