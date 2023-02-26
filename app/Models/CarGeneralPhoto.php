<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarGeneralPhoto extends Model
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

    public function getPathAttribute($path) {
        return env('API_URL') . '/' . $path;
    }
}
