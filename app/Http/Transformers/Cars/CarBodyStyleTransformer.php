<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarBodyStyle;
use League\Fractal\TransformerAbstract;

class CarBodyStyleTransformer extends TransformerAbstract
{
    public function transform(CarBodyStyle $carBodyStyle)
    {
        return [
            'id' => $carBodyStyle->id,
            'name' => $carBodyStyle->name,
        ];
    }
}
