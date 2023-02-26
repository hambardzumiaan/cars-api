<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarType;
use League\Fractal\TransformerAbstract;

class CarTypeTransformer extends TransformerAbstract
{
    public function transform($carType)
    {
        return [
            'id' => $carType->id,
            'name' => $carType->name,
        ];
    }
}
