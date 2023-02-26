<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarCard;
use League\Fractal\TransformerAbstract;

class CarCardShowTransformer extends TransformerAbstract
{
    public function transform(CarCard $carCard)
    {
        return [
            'id' => $carCard->id,
            'mark' => $carCard->mark,
            'model' => $carCard->model,
            'year' => $carCard->year,
            'type' => $carCard->type,
            'bodyStyle' => $carCard->bodyStyle,
            'sticker' => $carCard->sticker,
            'engine' => $carCard->engine,
            'fuelType' => $carCard->fuelType,
            'driveType' => $carCard->driveType,
            'transmission' => $carCard->transmission,
            'interiorColor' => $carCard->interiorColor,
            'exteriorColor' => $carCard->exteriorColor,
            'seat' => $carCard->seat,
            'vin' => $carCard->vin,
            'price' => $carCard->price,
            'status' => $carCard->status,
            'show_on_page' => $carCard->show_on_page,
            'city' => $carCard->city,
            'hwy' => $carCard->hwy,
            'description' => $carCard->description,
            'general_photos' => $carCard->generalPhotos,
            'before_renovation_photos' => $carCard->beforeRenovationPhotos,
            'after_renovation_photos' => $carCard->afterRenovationPhotos,
        ];
    }
}
