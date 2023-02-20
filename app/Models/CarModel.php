<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'car_mark_id',
    ];


    /**
     * Get the post that owns the comment.
     */
    public function carMark()
    {
        return $this->belongsTo(CarMark::class);
    }
}
