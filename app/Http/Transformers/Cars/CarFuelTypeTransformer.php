<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarFuelType;
use League\Fractal\TransformerAbstract;

class CarFuelTypeTransformer extends TransformerAbstract
{
    public function transform(CarFuelType $carFuelType)
    {
        return [
            'id' => $carFuelType->id,
            'name' => $carFuelType->name,
        ];
    }
}
