<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'price',
        'image',
        'background_image'
    ];

    // ✅ علاقة الصور المتعددة
    public function images()
    {
        return $this->hasMany(TripImage::class);
    }
}