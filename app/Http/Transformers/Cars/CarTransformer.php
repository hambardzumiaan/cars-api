<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarCard;
use League\Fractal\TransformerAbstract;

class CarTransformer extends TransformerAbstract
{
    public function transform(CarCard $carCard)
    {
        return [
            'id' => $carCard->id,
            'mark' => $carCard->mark->name,
            'model' => $carCard->model->name,
            'year' => $carCard->year->year,
            'type' => $carCard->type ? $carCard->type->name : null,
            'bodyStyle' => $carCard->bodyStyle ? $carCard->bodyStyle->name : null,
            'sticker' => $carCard->sticker,
            'engine' => $carCard->engine ? $carCard->engine->name : null,
            'fuelType' => $carCard->fuelType ? $carCard->fuelType->name : null,
            'driveType' => $carCard->driveType ? $carCard->driveType->name : null,
            'transmission' => $carCard->transmission ? $carCard->transmission->name : null,
            'interiorColor' => $carCard->interiorColor ? $carCard->interiorColor->name : null,
            'exteriorColor' => $carCard->exteriorColor ? $carCard->exteriorColor->name : null,
            'seat' => $carCard->seat ? $carCard->seat->name : null,
            'vin' => $carCard->vin,
            'price' => $carCard->price,
            'status' => $carCard->status,
            'show_on_page' => $carCard->show_on_page,
            'city' => $carCard->city,
            'hwy' => $carCard->hwy,
            'description' => strip_tags(html_entity_decode($carCard->description)),
            'equipment' => $carCard->equipment,
            'general_photos' => $carCard->generalPhotos,
            'before_renovation_photos' => $carCard->beforeRenovationPhotos,
            'after_renovation_photos' => $carCard->afterRenovationPhotos,
            'video' => $carCard->video,
            'view_360' => $carCard->view_360,
            'view_360_image' => $carCard->view_360 ? $carCard->view_360_image : null,
        ];
    }
}
