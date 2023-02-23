<?php

namespace App\Http\Transformers\Cars;

use App\Models\CarSeat;
use League\Fractal\TransformerAbstract;

class CarSeatTransformer extends TransformerAbstract
{
    public function transform(CarSeat $carSeat)
    {
        return [
            'id' => $carSeat->id,
            'name' => $carSeat->name,
        ];
    }
}
