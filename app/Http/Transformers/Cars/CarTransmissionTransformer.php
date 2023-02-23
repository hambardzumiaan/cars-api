<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarTransmission;
use League\Fractal\TransformerAbstract;

class CarTransmissionTransformer extends TransformerAbstract
{
    public function transform(CarTransmission $carTransmission)
    {
        return [
            'id' => $carTransmission->id,
            'name' => $carTransmission->name,
        ];
    }
}
