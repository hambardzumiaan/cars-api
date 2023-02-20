<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarExteriorColor;
use App\Models\CarType;
use League\Fractal\TransformerAbstract;

class CarExteriorColorTransformer extends TransformerAbstract
{
    public function transform(CarExteriorColor $carExteriorColor)
    {
        return [
            'id' => $carExteriorColor->id,
            'name' => $carExteriorColor->name,
        ];
    }
}
