<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarEngine;
use App\Models\CarType;
use League\Fractal\TransformerAbstract;

class CarEngineTransformer extends TransformerAbstract
{
    public function transform(CarEngine $carEngine)
    {
        return [
            'id' => $carEngine->id,
            'name' => $carEngine->name,
        ];
    }
}
