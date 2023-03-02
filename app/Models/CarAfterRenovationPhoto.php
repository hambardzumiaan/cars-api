<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarAfterRenovationPhoto extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_card_id',
        'path',
    ];

    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return env('API_URL') . '/' . $this->path;
    }
}
