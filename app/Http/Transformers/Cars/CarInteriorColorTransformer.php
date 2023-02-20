<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarInteriorColor;
use League\Fractal\TransformerAbstract;

class CarInteriorColorTransformer extends TransformerAbstract
{
    public function transform(CarInteriorColor $carInteriorColor)
    {
        return [
            'id' => $carInteriorColor->id,
            'name' => $carInteriorColor->name,
        ];
    }
}
