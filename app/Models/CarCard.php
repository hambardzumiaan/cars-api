<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCard extends Model
{

    use HasFactory;

    protected $table = 'car_cards';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_mark_id',
        'car_model_id',
        'car_year_id',
        'car_type_id',
        'vin',
        'price',
        'status',
        'show_on_page',
        'city',
        'hwy',
        'car_body_style_id',
        'car_sticker_id',
        'car_engine_id',
        'car_fuel_type_id',
        'car_drive_type_id',
        'car_transmission_id',
        'car_interior_color_id',
        'car_exterior_color_id',
        'car_seat_id',
        'description',
        'video',
        'view_360',
    ];

    protected $appends = ['view_360_image'];

    public function getView360ImageAttribute($view_360)
    {
        return env('API_URL') . '/' . $view_360;
    }

    public function mark()
    {
        return $this->belongsTo(CarMark::class, 'car_mark_id', 'id');
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id', 'id');
    }

    public function year()
    {
        return $this->belongsTo(CarYear::class, 'car_year_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(CarType::class, 'car_type_id', 'id');
    }

    public function bodyStyle()
    {
        return $this->belongsTo(CarBodyStyle::class, 'car_body_style_id', 'id');
    }

    public function sticker()
    {
        return $this->belongsTo(CarSticker::class, 'car_sticker_id', 'id');
    }

    public function engine()
    {
        return $this->belongsTo(CarEngine::class, 'car_engine_id', 'id');
    }

    public function fuelType()
    {
        return $this->belongsTo(CarFuelType::class, 'car_fuel_type_id', 'id');
    }

    public function driveType()
    {
        return $this->belongsTo(CarDriveType::class, 'car_drive_type_id', 'id');
    }

    public function transmission()
    {
        return $this->belongsTo(CarTransmission::class, 'car_transmission_id', 'id');
    }

    public function interiorColor()
    {
        return $this->belongsTo(CarInteriorColor::class, 'car_interior_color_id', 'id');
    }

    public function exteriorColor()
    {
        return $this->belongsTo(CarExteriorColor::class, 'car_exterior_color_id', 'id');
    }

    public function seat()
    {
        return $this->belongsTo(CarSeat::class, 'car_seat_id', 'id');
    }

    public function generalPhotos()
    {
        return $this->hasMany(CarGeneralPhoto::class);
    }

    public function beforeRenovationPhotos()
    {
        return $this->hasMany(CarBeforeRenovationPhoto::class);
    }

    public function afterRenovationPhotos()
    {
        return $this->hasMany(CarAfterRenovationPhoto::class);
    }
}
