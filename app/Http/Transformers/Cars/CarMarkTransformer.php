<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarMark;
use League\Fractal\TransformerAbstract;

class CarMarkTransformer extends TransformerAbstract
{
    public function transform(CarMark $carMark)
    {
        return [
            'id' => $carMark->id,
            'name' => $carMark->name,
        ];
    }
}
