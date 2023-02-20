<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarDriveType;
use League\Fractal\TransformerAbstract;

class CarDriveTypeTransformer extends TransformerAbstract
{
    public function transform(CarDriveType $carDriveType)
    {
        return [
            'id' => $carDriveType->id,
            'name' => $carDriveType->name,
        ];
    }
}
