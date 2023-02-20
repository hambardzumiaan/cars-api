<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarType;
use App\Models\CarYear;
use League\Fractal\TransformerAbstract;

class CarYearTransformer extends TransformerAbstract
{
    public function transform(CarYear $carYear)
    {
        return [
            'id' => $carYear->id,
            'year' => $carYear->year,
        ];
    }
}
